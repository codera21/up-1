<?php ///*dd($users[0]->children)*/ dd(env('SITE'));?>
@extends('layouts.frontend.default')
<style>
    .myTable > tbody > .myTableRow > td {
        padding: 0px;
    }

    .myTable > tbody > .myTableRow > th {
        padding: 0px;
    }
</style>
@section('page_title')
    {{ trans('app.tree') }}
@endsection
@section('content')
    <br>
    <?php $count = 0?>
    @foreach($users as $user )
        <?php $count++ ?>
    @endforeach
    <?php  if($count):?>
    <a href="/group/send/{{$user->username}}" class="btn btn-primary text-white" type="button" style="float: right">
        Message All</a>
    <?php endif;?>
    <br>
    <table class="table myTable">
        <thead class="thead-dark">
        <?php if($count):?>
        <tr>
            <th scope="col">Level</th>
            <th scope='col'>SN</th>
            <th scope="col">Subscribers</th>
            <th scope="col">Status</th>
            <th scope="col">Total fees</th>
            <th scope="col">Total commissions</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>


        {{-- 8888888888888888888888888888888888888   Level one    88888888888888888888888888888888888888888888888888888888--}}
        <?php $count = 1; $level = 1; $one = 0; ?>
        <?php foreach ($users as $list): ?>
        <tr class="myTableRow">
            <th>{{$level}}</th>
            <td>{{$count}}</td>
            <td>{{$list->first_name." ". $list->last_name}}</td>
            <td> <?php
                if ($list->not_now == 0) {
                    if ($list->is_active == 'YES') {
                        echo '&#9989';
                        $one++;
                    } else {
                        echo '&#x274C';
                    }
                } else {
                    echo '&#x274C';
                }
                ?></td>
            <td><?php
                if ($list->not_now == 0) {
                    if ($list->is_active == 'YES') {
                        echo $amount;
                    } else {
                        echo 'Not paid';
                    }
                } else {
                    echo 'Not paid';
                }
                ?></td>
            <td> <?php
                if ($list->not_now == 0) {
                    if ($list->is_active == 'YES') {
                        echo $comm;
                    } else {
                        echo '0';
                    }
                } else {
                    echo '0';
                }
                ?></td>
            <td><a href="/message/{{$user->username}}" class="btn btn-primary btn-xs" type="button"
                   style="color: white">Message</a>
            </td>
        </tr>
        <?php $count++;
        $level = "";
        ?>
        <?php endforeach; ?>



        {{-- 8888888888888888888888888888888888888   Level Two    88888888888888888888888888888888888888888888888888888888--}}
        <tr>
            <td colspan="6"></td>
        </tr>
        <?php $count1 = 1; $secondLevel = 2; $two = 0;?>
        @foreach($users as $user)
            <?php $second_level = $user->children?>
            @foreach($second_level as $second)
                <tr class="myTableRow">
                    <th>{{$secondLevel}}</th>
                    <td><?php echo $count1 ?></td>
                    <td>{{$second->first_name." ".$second->last_name}}</td>
                    <td> <?php
                        if ($second->not_now == 0) {
                            if ($second->is_active == 'YES') {
                                echo '&#9989';
                                $two++;
                            } else {
                                echo '&#x274C';
                            }
                        } else {
                            echo '&#x274C';
                        }
                        ?></td>
                    <td> <?php
                        if ($second->not_now == 0) {
                            if ($second->is_active == 'YES') {
                                echo $amount;
                            } else {
                                echo 'Not paid';
                            }
                        } else {
                            echo 'Not paid';
                        }
                        ?></td>
                    <td> <?php
                        if ($second->not_now == 0) {
                            if ($second->is_active == 'YES') {
                                echo $comm;
                            } else {
                                echo '0';
                            }
                        } else {
                            echo '0';
                        }
                        ?></td>
                    <td><a href="/message/{{$second->username}}" class="btn btn-primary btn-xs" type="button"
                           style="color: white">Message</a>
                    </td>
                </tr>
                <?php $count1++;
                $secondLevel = ""
                ?>
            @endforeach
        @endforeach



        {{-- //////////////////////////////////////////  Level 3  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
        <tr>
            <td colspan="5"></td>
        </tr>
        <?php $levelThree = 3;$count2 = 0; $three = 0;
        ?>
        @foreach($users as $user)
            <?php $second_level = $user->children;?>
            @foreach($second_level as $second)
                <?php $third_level = $second->children?>
                @foreach($third_level as $third)
                    <tr class="myTableRow">
                        <th>{{$levelThree}}</th>
                        <td>{{++$count2}}</td>
                        <td>{{$third->first_name." ".$third->last_name}}</td>
                        <td>  <?php
                            if ($third->not_now == 0) {
                                if ($third->is_active == 'YES') {
                                    echo '&#9989';
                                    $three++;
                                } else {
                                    echo '&#x274C';
                                }
                            } else {
                                echo '&#x274C';
                            }
                            ?></td>
                        <td> <?php
                            if ($third->not_now == 0) {
                                if ($third->is_active == 'YES') {
                                    echo $amount;
                                } else {
                                    echo 'Not paid';
                                }
                            } else {
                                echo 'Not paid';
                            }
                            ?></td>
                        <td><?php
                            if ($third->not_now == 0) {
                                if ($third->is_active == 'YES') {
                                    echo $comm;
                                } else {
                                    echo '0';
                                }
                            } else {
                                echo '0';
                            }
                            ?></td>
                        <td><a href="/message/{{$third->username}}" class="btn btn-primary btn-xs" type="button"
                               style="color: white">Message</a>
                        </td>
                    </tr>
                    <?php $levelThree = "" ?>
                @endforeach
            @endforeach
        @endforeach



        {{-- //////////////////////////////////////////////////////////// Level Four \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\--}}
        <tr>
            <td colspan="5"></td>
        </tr>
        <?php  $levelFour = 4; $count3 = 1; $four = 0  ?>
        @foreach($users as $user)
            <?php $second_level = $user->children?>
            @foreach($second_level as $second)
                <?php $third_level = $second->children?>
                @foreach($third_level as $third)
                    <?php $forth_level = $third->children?>
                    @foreach($forth_level as $forth)
                        <tr class="myTableRow">
                            <th>{{$levelFour}}</th>
                            <td>{{$count3}}</td>
                            <td>{{$forth->first_name."".$forth->last_name}}</td>
                            <td><?php
                                if ($forth->not_now == 0) {
                                    if ($forth->is_active == 'YES') {
                                        echo '&#9989';
                                        $four++;
                                    } else {
                                        echo '&#x274C';
                                    }
                                } else {
                                    echo '&#x274C';
                                }
                                ?></td>
                            <td><?php
                                if ($forth->not_now == 0) {
                                    if ($forth->is_active == 'YES') {
                                        echo $amount;
                                    } else {
                                        echo 'Not paid';
                                    }
                                } else {
                                    echo 'Not paid';
                                }
                                ?></td>
                            <td><?php
                                if ($forth->not_now == 0) {
                                    if ($forth->is_active == 'YES') {
                                        echo $comm;
                                    } else {
                                        echo '0';
                                    }
                                } else {
                                    echo '0';
                                }
                                ?></td>
                            <td><a href="/message/{{$forth->username}}" class="btn btn-primary btn-xs" type="button"
                                   style="color: white">Message</a>
                            </td>
                        </tr>

                        <?php $levelFour = ""; $count3++;  ?>
                    @endforeach
                @endforeach
            @endforeach
        @endforeach


        {{-- ???????????????????????????????????  Total ???????????????????????????????????????????????????????????????????????????????????????--}}
        <?php $total = $one + $two + $three + $four;?>
        <tr>
            <th colspan="4" style="text-align: center;font-size: 2rem">Total</th>
            <td>
                @if(env('SITE') == 'ENG')
                    ${{$total*50}}
                @else
                    {{$total*1000}}F
                @endif
            </td>
            <td>
                @if(env('SITE') == 'ENG')
                    ${{$total*5}}
                @else
                    {{$total*100}}F
                @endif
            </td>
            <td>
                {{--<button type="button" class="btn btn-primary btn-xs">Payment</button>--}}
            </td>
        </tr>

        <?php else:?>
        <h1>Users dont have any subscriber</h1>
        <?php endif;?>
        </tbody>
    </table>

    {{--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

@endsection
