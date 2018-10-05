<?php

namespace App\Libs;

use Session;
use Input;
use Form;

class Grid
{

    private $gridId = '';
    private $gridName = 'grid';
    private $baseUrl = '/';
    private $data;
    private $mainActions = array();
    private $bulkActions = array();
    private $primaryKey = 'id';
    private $cols = array();
    private $rows = array();
    private $paginator;
    
    
    
    private $paginationStyle = 'INPUT';//LINKS,INPUT,SELECT
    private $recordsPerPageStyle = 'SELECT';//LINKS,INPUT,SELECT
    
    private $pageRange = 9; //Default
    private $recordsPerPage = array(25, 50, 100, 200, 500);
    private $limit = 25;
    
    /**
     * @constructor
     */
    public function __construct()
    {
        
    }

    /**
     * Set grid name
     *
     * @param string $name
     * @return \App\Libs\Grid
     */
    public function setGridName($name)
    {
        $this->gridName = $name;
        return $this;
    }

    /**
     * Set base url
     *
     * @param string $url
     * @return \App\Libs\Grid
     */
    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
        return $this;
    }
    
    
    /**
     * Set unique id
     *
     * @param integer $key
     * @return \App\Libs\Grid
     */
    public function setPrimaryKey($key)
    {
        $this->primaryKey = $key;
        return $this;
    }

    /**
     * Set paginator information
     *
     * @param object $model
     * @param string $order_by
     * @param string $order
     * @param integer $limit
     * @return \App\Libs\Grid
     */
    public function setPaginator($model, $order_by, $order, $limit = 10)
    {
        $this->data = $this->getPost();

        //Sort
        if (isset($this->data['order_by']) and isset($this->data['order'])) {
            $order_by = $this->data['order_by'];
            $order = $this->data['order'];
        } else {
            $this->data['order_by'] = $order_by;
            $this->data['order'] = $order;
        }

        //Limit
        if (isset($this->data['limit'])) {
            $limit = $this->data['limit'];
        } else {
            $this->data['limit'] = $limit;
        }

        //Laravel Fix
        if (isset($this->data['page'])) {
            Input::merge(array('page' => $this->data['page']));
        }
        if (isset($this->data['search'])) {
            Input::merge(array('search' => $this->data['search']));
        }

        $paginator = $model->orderBy($order_by, $order)->paginate($limit);



        $total = $paginator->total();

        $page = $paginator->currentPage();
        $total_pages = ceil($total / $limit);

        $first_page = 1;
        $last_page = $paginator->lastPage();
        $next_page = $page + 1 <= $last_page ? $page + 1 : null;
        $prev_page = $page - 1 > 0 ? $page - 1 : null;

        $this->data['page'] = $paginator->currentPage();
        $this->data['total_pages'] = $total_pages;
        $this->data['first_page'] = 1;
        $this->data['last_page'] = $last_page;
        $this->data['next_page'] = $next_page;
        $this->data['prev_page'] = $prev_page;
        $this->data['from'] = $paginator->firstItem(); //$page*$limit;
        $this->data['to'] = $paginator->lastItem(); //(($page*$limit)-$limit)+1;
        $this->data['total'] = $total;

        $this->paginator = $paginator;

        return $this;
    }

    /**
     * Get paginator
     *
     * @return object
     */
    private function getPaginator()
    {
        return $this->paginator;
    }

    /**
     * Render grid html
     */
    public function render()
    {
        $html = '';
        $html.='<script type="text/javascript">

                $(document).ready(function(){

                        $("#' . $this->gridName . '").grid();

                });

        </script>';
        $html.='<!--Grid Start-->';
        $html.='<div id="' . $this->gridName . '" class="grid">';
        $html.='<form name="gridFrom" action="" method="get" class="gridForm form-horizontal">';
        //$html.='<input type="hidden" name="_token" value="'.csrf_token().'">';

        $html.='<div id="gridInner">';
        $html.=$this->getHeader();
        $html.=$this->getBody();
        $html.=$this->getFooter();
        $html.='<div class="clearfix"></div>';
        $html.='</div>';

        $html.='</form>';
        $html.='</div>';
        $html.='<!--Grid End-->';
        echo $html;
    }

    /**
     * Set post data in session
     *
     * @param type $data
     */
    private function setSessionData($data)
    {
        $CurrentURI = $this->baseUrl;
        $this->gridId = base64_encode($CurrentURI);

        $SessionGrid = array();
        $SessionGrid[$this->gridId]['gridId'] = $this->gridId;
        $SessionGrid[$this->gridId]['POST'] = $data;
        Session::put('SessionGrid', $SessionGrid);
    }

    /**
     * Get post data from session
     *
     * @return array
     */
    private function getSessionData()
    {
        $CurrentURI = $this->baseUrl;
        $this->gridId = base64_encode($CurrentURI);

        $SessionGrid = Session::get('SessionGrid');


        if (isset($SessionGrid[$this->gridId])) {
            $data = $SessionGrid[$this->gridId]['POST'];
        } else {
            $data = array();
        }

        return $data;
    }

    /**
     * Get POST/GET
     *
     * @return array
     */
    private function getPost()
    {
        $post = array();
        $data = array();
        if (Input::all()) {
            $post = Input::all();
            $this->setSessionData($post);
        } else {
            $post = $this->getSessionData();
        }



        $required = array("order_by", "order", "limit", "page");
        foreach ($post as $key => $value) {
            if (in_array($key, $required)) {
                if ($value != "undefined") {//JQuery Problem
                    $data[$key] = trim($value);
                }
            }
        }
        if (isset($post['search'])) {
            foreach ($post['search'] as $key => $value) {
                if ($value != "") {
                    $data['search'][$key] = $value;
                }
            }
        }

        return $data;
    }

    /*
    |--------------------------------------------------------------------------
    | Grid Header
    |--------------------------------------------------------------------------
    */

    /**
     * Get grid header
     * @return string
     */
    private function getHeader()
    {
        $html = '<div id="gridHeader">';
        $html.=$this->getMainActions();
        $html.=$this->getSearchForm();
        $html.=$this->getBulkActions();
        $html.='</div>';
        return $html;
    }

    /**
     * Set main actions
     *
     * @param type $mainActions
     * @return \App\Libs\Grid
     */
    public function setMainActions($mainActions = array())
    {

        $this->mainActions = $mainActions;
        return $this;
    }

    /**
     * Get main actions
     *
     * @return string
     */
    private function getMainActions()
    {
        $actions = $this->mainActions;


        $buttons = array();
        $buttons['refresh'] = array('icon' => '<i class="glyphicon glyphicon-refresh"></i>', 'class' => 'btn btn-default');
        $buttons['add'] = array('icon' => '<i class="glyphicon glyphicon-plus"></i>', 'class' => 'btn btn-primary');
        $buttons['edit'] = array('icon' => '<i class="glyphicon glyphicon-edit"></i>', 'class' => 'btn btn-success');
        $buttons['delete'] = array('icon' => '<i class="glyphicon glyphicon-remove"></i>', 'class' => 'btn btn-danger');
        $buttons['import'] = array('icon' => '<i class="glyphicon glyphicon-import"></i>', 'class' => 'btn btn-default');
        $buttons['export'] = array('icon' => '<i class="glyphicon glyphicon-export"></i>', 'class' => 'btn btn-default');
        $buttons['print'] = array('icon' => '<i class="glyphicon glyphicon-print"></i>', 'class' => 'btn btn-default');

        //message buttons
        $buttons['inbox'] = array('icon' => '<i class="glyphicon glyphicon-inbox"></i>', 'class' => 'btn btn-primary text-white');
        $buttons['unread'] = array('icon' => '<i class="glyphicon glyphicon-eye-close"></i>', 'class' => 'btn btn-primary text-white');
        $buttons['sent'] = array('icon' => '<i class="glyphicon glyphicon-check"></i>', 'class' => 'btn btn-primary text-white');
        $buttons['trash'] = array('icon' => '<i class="glyphicon glyphicon-trash"></i>', 'class' => 'btn btn-primary text-white');

        $html = '<div id="gridMainActions">';
        if (is_array($actions) and ! empty($actions)) {

            foreach ($actions as $action) {
                if (isset($buttons[$action['name']])) {
                    $button = $buttons[$action['name']];

                    $name = isset($action['name']) ? $action['name'] : '';
                    $title = isset($action['title']) ? $action['title'] : '';
                    $url = isset($action['url']) ? $action['url'] : 'javascript:void(0)';
                    $target = isset($action['target']) ? $action['target'] : '';
                    $class = isset($action['class']) ? $button['class'] . ' ' . $action['class'] : $button['class'];
                    $icon = isset($action['icon']) ? $action['icon'] : $button['icon'];
                    $html .= '<a href="' . $url . '" target="' . $target . '" id="' . $name . '" data-method="' . $name . '" title="' . $title . '" class="' . $class . '">' . $icon . ' ' . $title . '</a>&nbsp;&nbsp;';
                }
            }
        }
        $html .= '</div>';
        return $html;
    }

    /**
     * Set bulk actions
     *
     * @param array $bulkActions
     * @return \App\Libs\Grid
     */
    public function setBulkActions($bulkActions)
    {
        $this->bulkActions = $bulkActions;
        return $this;
    }

    /**
     * Get bulk actions
     *
     * @return string
     */
    private function getBulkActions()
    {
        $html = '';

        $actions = $this->bulkActions;

        if (is_array($actions) and ! empty($actions)) {
            $html = '<div id="gridBulkActions">
                            <div class="pull-right">' . Form::select('bulk_action', $actions, null, ['id' => 'bulk_action', 'class' => 'form-control', 'placeholder' => '----- ' . 'Bulk Action' . ' -----']) . '</div>
                             <div class="clearfix"></div>
                        </div>';
        }
        return $html;
    }

    /**
     * Get search form
     *
     * @return string
     */
    private function getSearchForm()
    {
        $html = '';

        $cols = $this->getColumns();

        if (is_array($cols) and ! empty($cols)) {
            //Advanced Search Form
            $html = '
            <div class="clearfix"></div>


            <div id="gridSearchForm">

            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Search</h3>
            </div>
            <div class="panel-body">
            ';

            $totalSearchFields = 0;

            foreach ($cols as $col) {
                if ($col['searchable'] == true) {
                    
                    $label = isset($col['label']) ? $col['label'] : 'N/A';
                    $type = isset($col['searchfield']['type']) ? $col['searchfield']['type'] : 'text';
                    $name = isset($col['searchfield']['name']) ? $col['searchfield']['name'] : $col['name'];
                    $id = isset($col['searchfield']['name']) ? $col['searchfield']['name'] : $col['name'];
                    $attr = isset($col['searchfield']['attr']) ? $col['searchfield']['attr'] : array();
                    $options = isset($col['searchfield']['options']) ? $col['searchfield']['options'] : array();
                    $value = isset($this->data['search'][$name]) ? $this->data['search'][$name] : null;



                    if (isset($attr) and is_array($attr) and ! empty($attr)) {
                        $attr['class'] = 'form-control ' . $attr['class'];
                    } else {
                        $attr['class'] = 'form-control';
                    }

                    if ($type == 'text') {
                        $field = Form::text('search[' . $name . ']', $value, $attr);
                    } elseif ($type == 'select') {
                        $attr['placeholder'] = '----- Select ' . $label . ' -----';
                        $field = Form::select('search[' . $name . ']', $options, $value, $attr);
                    } elseif ($type == 'radios') {
                        $field = Form::radios('search[' . $name . ']', $options, $value, $attr);
                    } elseif ($type == 'checkboxes') {
                        $field = Form::checkboxes('search[' . $name . ']', $options, $value, $attr);
                    }


                    $html.='
                                <div class="form-group col-md-6">
                                        <label class="col-md-4">' . $label . '</label>
                                        <div class="col-md-8">
                                          ' . $field . '
                                        </div>
                                </div>
                                ';

                    $totalSearchFields++;
                }
            }

            $html.='
            </div>
            <div class="panel-footer">
                 <div class="pull-right">
                     <button class="btn btn-primary" name="Search" type="submit"><i class="glyphicon glyphicon-search"></i> Search</button> <button class="btn btn-default" name="Reset" type="reset"> Reset</button>
                 </div>
                 <div class="clearfix"></div>

            </div>
            </div>

             </div><!-- /#gridSearchForm -->
             ';
        } else {//Simple Search Form
            $html = '
                        <div class="clearfix"></div>


                        <div id="gridSearchForm">

                            <div class="pull-right">

                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="' . Input::get('search') . '">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>

                            </div>


                        </div><!-- /#gridSearchForm -->
                        ';
        }
        if($totalSearchFields == 0){
            $html ='<div class="clearfix"></div>';
        } 
        
        return $html;
        
    }

    /*
    |--------------------------------------------------------------------------
    | Grid Body
    |--------------------------------------------------------------------------
    */

    /**
     * Get grid body
     *
     * @return string
     */
    private function getBody()
    {
        $cols = $this->getColumns();
        $rows = $this->getRows();

        $html = '<div id="gridBody">';
        $html.='<table cellspacing="0" cellpadding="0" border="0" class="gridTable table table-striped table-bordered table-hover">';
        $html.='<thead><tr>';
        
        if (is_array($this->bulkActions) and ! empty($this->bulkActions)) {
            $html.='<th width="20"><input type="checkbox" name="id[]" value="" class="selector" /></th>';
        } else {
            $html.='<th width="20">#</th>';
        }


        foreach ($cols as $col) {
            if ($col['sortable'] == true) {
                if (isset($this->data['order_by']) and $this->data['order_by'] == $col['name']) {
                    if ($this->data['order'] == "desc") {
                        $class = "sorting_desc";
                    } else {
                        $class = "sorting_asc";
                    }
                } else {
                    $class = "sorting";
                }
                $html.='<th width="' . $col['width'] . '" class="' . $class . '">' . $this->orderBy($col['name'], $col['label']) . '</th>';
            } else {
                $html.='<th width="' . $col['width'] . '">' . $col['label'] . '</th>';
            }
        }
        $html.='</tr></thead>';


        $html.='<tbody>';

        $counter = 0;
        foreach ($rows as $row) {
            $html.='<tr>';
            
            if (is_array($this->bulkActions) and !empty($this->bulkActions)) {
                $html.='<td><input type="checkbox" name="' . $this->primaryKey . '[]" value="' . $row->{$this->primaryKey} . '" class="selector" /></td>';
            } else {
                $html.='<td>'.($this->data['from']+$counter).'</td>';
            }

            foreach ($cols as $col) {
                if (isset($col['value']) and is_callable($col['value'])) {
                    $html.='<td>' . call_user_func($col['value'], $row) . '</td>';
                } else {
                    $html.='<td>N/A</td>';
                }
            }
            $html.='</tr>';

            $counter++;
        }


        $html.='</tbody>';

        $html.='</table>';
        $html.='</div>';

        return $html;
    }

    /**
     * Set data table columns
     *
     * @param string $cols
     * @return \App\Libs\Grid
     */
    public function setColumns($cols = array())
    {
        $this->cols = $cols;
        return $this;
    }

    /**
     * Get data table columns
     *
     * @return array
     */
    private function getColumns()
    {
        return $this->cols;
    }

    /**
     * Set data table rows
     *
     * @param type $rows
     * @return \App\Libs\Grid
     */
    private function setRows($rows = array())
    {
        $this->rows = $rows;
        return $this;
    }

    /**
     * Get data table rows
     *
     * @return object
     */
    private function getRows()
    {
        //return $this->rows;
        return $this->getPaginator();
    }

    /**
     * Get sorter heading
     *
     * @param string $field
     * @param string $label
     * @return string
     */
    private function orderBy($field, $label)
    {

        if (isset($this->data['order_by']) and $this->data['order_by'] == $field) {
            if ($this->data['order'] == "desc") {
                $order = "asc";
                $class = "desc";
            } else {
                $order = "desc";
                $class = "asc";
            }
        } else {
            $order = "asc";
            $class = "";
        }

        return $html = '<a href="' . $this->getUrl(array("order_by" => $field, "order" => $order)) . '" class="' . $class . '">' . $label . '</a>';
    }

    /*
    |--------------------------------------------------------------------------
    | Grid Footer
    |--------------------------------------------------------------------------
    */

    /**
     * Get grid footer
     *
     * @return string
     */
    private function getFooter()
    {
        $order_by = isset($this->data['order_by']) ? $this->data['order_by'] : '';
        $order = isset($this->data['order']) ? $this->data['order'] : '';
        $limit = isset($this->data['limit']) ? $this->data['limit'] : '';
        $page = isset($this->data['page']) ? $this->data['page'] : 1;

        $paginationStyle = $this->paginationStyle;
        $recordsPerPageStyle = $this->recordsPerPageStyle;

        $html = '<div id="gridFooter">';
        $html.=$this->getPagination();
        $html.='<div id="clearfix"></div>';
        $html.=$this->getRecordsPerPage();
        $html.=$this->getDisplayInfo();
        $html.='<input type="hidden" name="order_by" id="order_by" value="' . $order_by . '"/>';
        $html.='<input type="hidden" name="order" id="order" value="' . $order . '"/>';
        $html.='<input type="hidden" name="action" id="action" value=""/>';
        if ($paginationStyle == 'LINKS') {
            $html.='<input type="hidden" name="page" id="page" value="' . $page . '"/>';
        }
        if ($recordsPerPageStyle == 'LINKS') {
            $html.='<input type="hidden" name="limit" id="limit" value="' . $this->data['limit'] . '"/>';
        }
        $html.='</div>';
        return $html;
    }

    /**
     * Get pagination
     *
     * @return type
     */
    private function getPagination()
    {
        $el = array();
        $page = $this->data['page'];
        $start_page = $this->data['first_page'];
        $end_page = $this->data['last_page'];
        $total_pages = $this->data['total_pages'];
        $first_page = $this->data['first_page'];
        $last_page = $this->data['last_page'];
        $next_page = $this->data['next_page'];
        $prev_page = $this->data['prev_page'];

        $paginationStyle = $this->paginationStyle;
        if ($paginationStyle == 'LINKS' and $total_pages > 1) {//Links Style
            $el[] = '<ul class="pagination-">';
            if ($page != 1) {
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $first_page)) . '" id="first_page" Page="' . $first_page . '"><i class="glyphicon glyphicon-step-backward" aria-hidden="true">&nbsp;</i></a></li>';
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $prev_page)) . '" id="prev_page" Page="' . $prev_page . '"><i class="glyphicon glyphicon-backward" aria-hidden="true">&nbsp;</i></a></li>';
            } else {
                $el[] = '<li><a href="javascript:void(0);" id="first_page"><i class="glyphicon glyphicon-step-backward" aria-hidden="true">&nbsp;</i></a></li>';
                $el[] = '<li><a href="javascript:void(0);" id="prev_page"><i class="glyphicon glyphicon-backward" aria-hidden="true">&nbsp;</i></a></li>';
            }

            for ($i = $start_page; $i <= $end_page; $i++) {
                if ($i == $page) {
                    $el[] = '<li class="active"><span>' . $i . '</span></li>';
                } else {
                    $el[] = '<li><a href="' . $this->getUrl(array("page" => $i)) . '" Page="' . $i . '">' . $i . '</a></li>';
                }
            }


            if ($page != $total_pages) {
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $next_page)) . '" id="next_page" Page="' . $next_page . '"><i class="glyphicon glyphicon-forward" aria-hidden="true">&nbsp;</i></a></li>';
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $last_page)) . '" id="last_page" Page="' . $last_page . '"><i class="glyphicon glyphicon-step-forward" aria-hidden="true">&nbsp;</i></a></li>';
            } else {
                $el[] = '<li><a href="javascript:void(0);" id="next_page"><i class="glyphicon glyphicon-forward" aria-hidden="true">&nbsp;</i></a></li>';
                $el[] = '<li><a href="javascript:void(0);" id="last_page"><i class="glyphicon glyphicon-step-forward" aria-hidden="true">&nbsp;</i></a></li>';
            }


            $el[] = '</ul>';
        } elseif ($paginationStyle == 'INPUT') {//Input Style
            $el[] = '<ul>';

            if ($page != 1) {
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $first_page)) . '" id="first_page" Page="' . $first_page . '"><i class="glyphicon glyphicon-step-backward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $prev_page)) . '" id="prev_page" Page="' . $prev_page . '"><i class="glyphicon glyphicon-backward" aria-hidden="true"></i></a></li>';
            } else {
                $el[] = '<li><a href="javascript:void(0);" id="first_page"><i class="glyphicon glyphicon-step-backward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="javascript:void(0);" id="prev_page"><i class="glyphicon glyphicon-backward" aria-hidden="true"></i></a></li>';
            }

            $el[] = '<li><input type="text" name="page" id="page" class="form-control input-sm" value="' . $page . '"/><span>&nbsp;&nbsp;of ' . $total_pages . '</span></li>';


            if ($page != $total_pages) {
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $next_page)) . '" id="next_page" Page="' . $next_page . '"><i class="glyphicon glyphicon-forward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $last_page)) . '" id="last_page" Page="' . $last_page . '"><i class="glyphicon glyphicon-step-forward" aria-hidden="true"></i></a></li>';
            } else {
                $el[] = '<li><a href="javascript:void(0);" id="next_page"><i class="glyphicon glyphicon-forward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="javascript:void(0);" id="last_page"><i class="glyphicon glyphicon-step-forward" aria-hidden="true"></i></a></li>';
            }
            $el[] = '</ul>';
        } elseif ($paginationStyle == 'SELECT') {//Select Style
            $el[] = '<ul>';
            if ($page != 1) {
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $first_page)) . '" id="first_page" Page="' . $first_page . '"><i class="glyphicon glyphicon-step-backward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $prev_page)) . '" id="prev_page" Page="' . $prev_page . '"><i class="glyphicon glyphicon-backward" aria-hidden="true"></i></a></li>';
            } else {
                $el[] = '<li><a href="javascript:void(0);" id="first_page"><i class="glyphicon glyphicon-step-backward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="javascript:void(0);" id="prev_page"><i class="glyphicon glyphicon-backward" aria-hidden="true"></i></a></li>';
            }


            $el[] = '<li><select name="page" id="page" class="form-control input-sm">';

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $el[] = '<option selected>' . $i . '</option>';
                } else {
                    $el[] = '<option>' . $i . '</option>';
                }
            }
            $el[] = '</select></li>';

            if ($page != $total_pages) {
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $next_page)) . '" id="next_page" Page="' . $next_page . '"><i class="glyphicon glyphicon-forward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="' . $this->getUrl(array("page" => $last_page)) . '" id="last_page" Page="' . $last_page . '"><i class="glyphicon glyphicon-step-forward" aria-hidden="true"></i></a></li>';
            } else {
                $el[] = '<li><a href="javascript:void(0);" id="next_page"><i class="glyphicon glyphicon-forward" aria-hidden="true"></i></a></li>';
                $el[] = '<li><a href="javascript:void(0);" id="last_page"><i class="glyphicon glyphicon-step-forward" aria-hidden="true"></i></a></li>';
            }
            $el[] = '</ul>';
        }

        if (count($el) > 0) {
            return $html = '<div id="gridPagination">' . implode("", $el) . '</div>';
        }
    }

    /**
     * Get records per page
     *
     * @param array $records
     * @return string
     */
    private function getRecordsPerPage($records = array(10, 20, 30, 40, 50))
    {
        $el = array();
        $records = $this->recordsPerPage;
        $recordsPerPage = $this->data['limit'];
        $recordsPerPageStyle = $this->recordsPerPageStyle;

        if ($recordsPerPageStyle == 'LINKS') {//Links Style
            foreach ($records as $record) {
                if ($record == $recordsPerPage) {
                    $el[] = '<span>' . $record . '</span>';
                } else {
                    $el[] = '<a href="' . $this->getUrl(array("limit" => $record)) . '" recordsPerPage="' . $record . '">' . $record . '</a>';
                }
            }
        } elseif ($recordsPerPageStyle == 'INPUT') {//Input Style
            $el[] = '<input type="text" name="limit" id="limit" class="form-control input-sm" value="' . $recordsPerPage . '"/>';
        } elseif ($recordsPerPageStyle == 'SELECT') {//Select Style
            $el[] = '<select name="limit" id="limit" class="form-control input-sm">';
            foreach ($records as $record) {
                if ($record == $recordsPerPage) {
                    $el[] = '<option selected>' . $record . '</option>';
                } else {
                    $el[] = '<option>' . $record . '</option>';
                }
            }
            $el[] = '</select>';
        }

        if (count($el) > 0) {
            return $html = '<div id="gridRecordsPerPage"> Display: ' . implode("", $el) . '</div>';
        }
    }

    /**
     * Get display info
     *
     * @return string
     */
    private function getDisplayInfo()
    {
        $page = $this->data['page'];
        $limit = $this->data['limit'];
        $total = $this->data['total'];
        $from = $this->data['from'];
        $to = $this->data['to'];

        if ($total > 0) {
            return $html = '<div id="gridDisplayInfo">Displaying ' . $from . ' to ' . $to . ' of  ' . $total . '</div>';
        }
    }

    /**
     * Get url
     *
     * @param array $data
     * @return string
     */
    private function getUrl($data)
    {
        $post = $this->getPost();
        if (count($post) >= 1) {
            foreach ($post as $key => $value) {
                if (array_key_exists($key, $data)) {
                    $params[$key] = $data[$key];
                } else {
                    $params[$key] = $value;
                }
            }
            foreach ($data as $field => $Value) {
                if (!isset($params[$field])) {
                    $params[$field] = $Value;
                }
            }
        } else {
            $params = $data;
        }

        $parameters = http_build_query($params);

        return $url = $this->baseUrl . "?" . $parameters;
        //return $url=str_replace("/index.php","",$_SERVER['PHP_SELF'])."?".$parameters;
    }

    /**
     * @destructor
     */
    public function __destruct()
    {
        //Nothing
    }

}
