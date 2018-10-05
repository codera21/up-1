<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Auth;
use Form;
use Helper;
use Route;

use App\Models\MaterialGroup;
use App\Models\MaterialSubGroup;
use App\Models\Material;
use App\Models\State;
use App\Models\User;
use App\Models\Page;
use App\Models\Bank;


class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {      
        //
        Form::macro('attributes', function($attr = array())
        {
            $html = '';
            foreach ($attr as $key => $val) {
                $html.=' ' . $key . '="' . $val . '"';
            }
            return $html;
        });

        Form::macro('radios', function($name, $options = array(), $checked = null, $attr = array(), $inline = true)
        {
            return \App\Libs\Form::radios($name, $options, $checked, $attr, $inline);
        });
        
        Form::macro('selectPaymentType', function($name, $selected = null, $attr = array())
        {
            $attr['placeholder']='----- Select Payment Type -----';
            
            //Get all payment types
            $paymentTypes = array();
            
            $paymentTypes['RECURRING'] = 'Recurring';
            $paymentTypes['ONE TIME'] = 'One Time';

            return Form::select($name, $paymentTypes, $selected, $attr);
        });        


        Form::macro('selectGroup', function($name, $selected = null, $attr = array())
        {
            $attr['placeholder']='----- Select Group -----';
            $attr['id'] = isset($attr['id']) ? $attr['id'] : 'group_id';

            //Get all material groups
            $materialGroups = MaterialGroup::all();
            $html = '';
            $html.='<select name="' . $name . '" ' . Form::attributes($attr) . '>';

            if ($materialGroups) {
                foreach ($materialGroups as $row) {
                    if($row->enable_payment_button == 'YES'){
                        if ($row->id == $selected and $row->id != "") {
                            $html.='<option value="' . $row->id . '" id="material-group-id-' . $row->id . '" selected>' . $row->title . ' $'. Helper::moneyFormat($row->price) .'</option>';
                        } else {
                            $html.='<option value="' . $row->id . '" id="material-group-id-' . $row->id . '">' . $row->title . ' $'. Helper::moneyFormat($row->price) . '</option>';
                        }
                    }                    
                }
            }

            $html.='</select>';

            return $html;
        });

        Form::macro('selectSubGroup', function($name, $selected = null, $attr = array())
        {
            $attr['placeholder']='----- Select Sub Group -----';
            $attr['id'] = isset($attr['id']) ? $attr['id'] : 'sub_group_id';
            
            //Get all material groups

            $materialSubGroups = MaterialSubGroup::all();
            
            $html = '';
            $html.='<select name="' . $name . '" ' . self::attributes($attr) . '>';

            if ($materialSubGroups) {
                foreach ($materialSubGroups as $row) {

                    if($row->enable_payment_button == 'YES'){

                        if ($row->id == $selected and $row->id != "") {
                             $html.='<option value="' . $row->id . '" id="material-sub-group-id-' . $row->id . '" class="material-group-id-'.$row->group_id.'" selected>' . $row->title . ' $'. Helper::moneyFormat($row->price) . '</option>';
                        } else {
                            $html.='<option value="' . $row->id . '" id="material-sub-group-id-' . $row->id . '" class="material-group-id-'.$row->group_id.'">' . $row->title . ' $'. Helper::moneyFormat($row->price) . '</option>';
                        }
                    }

                }
            }

            $html.='</select>';

            return $html;

        });


        Form::macro('selectMaterial', function($name, $selected = null, $attr = array())
        {
            
            $attr['id'] = isset($attr['id']) ? $attr['id'] : 'sub_group_id';
            
            //Get all materials

            $material = Material::all();
            $html = '';
            $html.='<select name="' . $name . '" ' . self::attributes($attr) . '>';

            if ($material) {
                foreach ($material as $row) {
                    if($row->enable_payment_button == 'YES'){
                        if ($row->id == $selected and $row->id != "") {
                           $html.='<option class="material-group-id-'.$row->group_id.'\material-sub-group-id-'.$row->sub_group_id.'" id="material-id-' . $row->id.'"  value="'.$row->id.'" selected>'.$row->title.'</option>';
                            
                        } else {
                            $html.='<option class="material-group-id-'.$row->group_id.'\material-sub-group-id-'.$row->sub_group_id.'" id="material-id-' . $row->id.'"  value="'.$row->id.'">'.$row->title.'</option>';
                        }
                    }
                    
                }
            }

            $html.='</select>';

            return $html;

        });

        Form::macro('selectState', function($name, $selected = null, $attr = array())
        {
            $attr['placeholder']='----- Select State -----';
            
            //Get all states
            $states = array();
            State::all()->map(function($item) use(&$states) {
                $states[$item->state_code] = $item->state_name;
            });
            
            return Form::select($name, $states, $selected, $attr);
        });

        Form::macro('selectUser', function($name, $selected = null, $attr = array())
        {
            $attr['placeholder']='----- Select Subscriber -----';
            
            //Get all users
            $users = array();
            User::all()->map(function($item) use(&$states) {
                $states[$item->id] = $item->first_name. ' - '.$item->last_name;
            });
            
            return Form::select($name, $states, $selected, $attr);
        });

        Form::macro('selectPage', function($name, $selected = null, $attr = array())
        {

            $attr['placeholder']='----- Select Page -----';

            $routeParams = Route::current()->parameters();

            //Get all pages
            if(isset($routeParams['id'])){
                $pages = Page::select('*')->where('type', '=', 'PAGE')->where('slug', '<>', 'home')->where('id', '<>', $routeParams['id'])->get();
            }else{
                $pages = Page::select('*')->where('type', '=', 'PAGE')->where('slug', '<>', 'home')->get();
            }

            $html = '';
            $html.='<select id="'.$name.'" name="' . $name . '" ' . Form::attributes($attr) . '>';
            $html.='<option value="" data-slug="">'.$attr['placeholder'].'</optio>';
            if ($pages) {
                foreach ($pages as $row) {
                    if ($row->id == $selected and $row->id != "") {
                        $html.='<option value="' . $row->id . '" data-slug="' . $row->slug . '"  selected>' . $row->title . '</option>';
                    } else {
                        $html.='<option value="' . $row->id . '" data-slug="' . $row->slug . '">' . $row->title . '</option>';
                    }
                }
            }

            $html.='</select>';

            return $html;

        });

        Form::macro('selectBlock', function($name, $selected = null, $attr = array())
        {

            $attr['placeholder']='----- Select Block -----';

            //Get all blocks
            $blocks = Page::select('*')->where('type', '=', 'BLOCK')->get();

            $html = '';
            $html.='<select name="' . $name . '" ' . Form::attributes($attr) . '>';

            if ($blocks) {
                foreach ($blocks as $row) {
                    if ($row->id == $selected and $row->id != "") {
                        $html.='<option value="' . $row->id . '" id="block-id-' . $row->id . '" selected>' . $row->title . '</option>';
                    } else {
                        $html.='<option value="' . $row->id . '" id="block-id-' . $row->id . '">' . $row->title . '</option>';
                    }
                }
            }

            $html.='</select>';

            return $html;

        });

        Form::macro('selectBankAccount', function($name, $selected = null, $attr = array())
        {
            $attr['placeholder']='----- Select Bank Account -----';
            
            //Get all banks
            $banks = array();
            Bank::all()->map(function($item) use(&$banks) {
                $banks[$item->id] = $item->bank_name. ' '.$item->account_title.' '.$item->account_no;
            });
            
            return Form::select($name, $banks, $selected, $attr);
        });
        
    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
       
    }
}
