<?php /*dd($users[0]->children)*/?>
@extends('layouts.frontend.default')

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
    <table class="table">
        <thead class="thead-dark">
        <?php if($count):?>
        <tr>
            <th scope="col">Level</th>
            <th scope = 'col'>SN</th>
            <th scope="col">Subscribers</th>
            <th scope="col">Status</th>
            <th scope="col">Total fees</th>
            <th scope="col">Total commissions</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <?php $levelone = 1?>
            <td>
            @foreach($users as $user)
                    <?php echo $levelone;
                        $levelone++;
                    ?>
                    <br>
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <a href="#">{{ $user->first_name }} {{ $user->last_name}}</a>
                    <br>
                @endforeach
            </td>
            <td>
                <?php $one = 0?>
                @foreach($users as $user)
                    <?php
                    if ($user->not_now == 0) {
                        if ($user->is_active == 'YES') {
                            echo '&#9989';
                            $one++;
                        } else {
                            echo '&#x274C';
                        }
                    } else {
                        echo '&#x274C';
                    }
                    ?>
                    <br>
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php
                    if ($user->not_now == 0) {
                        if ($user->is_active == 'YES') {
                            echo $amount;
                        } else {
                            echo 'Not paid';
                        }
                    } else {
                        echo 'Not paid';
                    }
                    ?>
                    <br>
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php
                    if ($user->not_now == 0) {
                        if ($user->is_active == 'YES') {
                            echo $comm;
                        } else {
                            echo '0';
                        }
                    } else {
                        echo '0';
                    }
                    ?>
                    <br>
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <a href="/message/{{$user->username}}" class="btn btn-primary btn-xs" type="button"
                       style="color: white">Message</a>
                    <br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <?php $second_level_sn = 1?>
            <td>
            @foreach($users as $user)
                    <?php $second_level = $user->children;
                        $level_two = 1;
                    ?>
                    @foreach($second_level as $second)
                        <?php echo $level_two;
                            $level_two++
                        ?>
                        <br>
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <a href="">{{$second->first_name}} {{$second->last_name}}</a>
                        <br>
                    @endforeach
                @endforeach
            </td>
            <td>
                <?php $two = 0 ?>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php
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
                        ?>
                        <br>
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php
                        if ($second->not_now == 0) {
                            if ($second->is_active == 'YES') {
                                echo $amount;
                            } else {
                                echo 'Not paid';
                            }
                        } else {
                            echo 'Not paid';
                        }
                        ?>
                        <br>
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php
                        if ($second->not_now == 0) {
                            if ($second->is_active == 'YES') {
                                echo $comm;
                            } else {
                                echo '0';
                            }
                        } else {
                            echo '0';
                        }
                        ?>
                        <br>
                    @endforeach
                @endforeach
            </td>

            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <a href="/message/{{$second->username}}" class="btn btn-primary btn-xs" type="button"
                           style="color: white">Message</a>
                        <br>
                    @endforeach
                @endforeach
            </td>

        </tr>
        <tr>
            <th scope="row">3</th>
            <td>
            @foreach($users as $user)
                    <?php $second_level = $user->children;
                        $levelthree = 1;
                    ?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php echo $levelthree;
                                $levelthree++;
                            ?>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach        
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <a href="">{{$third->first_name}} {{$third->last_name}}</a>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                <?php $three = 0?>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php
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
                            ?>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php
                            if ($third->not_now == 0) {
                                if ($third->is_active == 'YES') {
                                    echo $amount;
                                } else {
                                    echo 'Not paid';
                                }
                            } else {
                                echo 'Not paid';
                            }
                            ?>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php
                            if ($third->not_now == 0) {
                                if ($third->is_active == 'YES') {
                                    echo $comm;
                                } else {
                                    echo '0';
                                }
                            } else {
                                echo '0';
                            }
                            ?>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <a href="/message/{{$third->username}}" class="btn btn-primary btn-xs" type="button"
                               style="color: white">Message</a>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach
            </td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>
            <?php 
                $levelfour = 1;?>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                <?php echo $levelfour;
                                    $levelfour++;
                                ?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                <a href="">{{$forth->first_name}} {{$forth->last_name}}</a>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                <?php $four = 0?>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                <?php
                                if ($forth->not_now == 0) {
                                    if ($forth->is_active == 'YES') {
                                        echo '&#9989';
                                        $four++;
                                    } else {
                                        echo '&#x274C';
                                    }
                                } else {
                                    echo '&#x274C';
                                }?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                <?php
                                if ($forth->not_now == 0) {
                                    if ($forth->is_active == 'YES') {
                                        echo $amount;
                                    } else {
                                        echo 'Not paid';
                                    }
                                } else {
                                    echo 'Not paid';
                                }
                                ?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                <?php
                                if ($forth->not_now == 0) {
                                    if ($forth->is_active == 'YES') {
                                        echo $comm;
                                    } else {
                                        echo '0';
                                    }
                                } else {
                                    echo '0';
                                }
                                ?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                <a href="/message/{{$forth->username}}" class="btn btn-primary btn-xs" type="button"
                                   style="color: white">Message</a>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </td>
        </tr>
        <?php $total = $one + $two + $three + $four;?>
        <tr>
            <th colspan="3" style="text-align: center;font-size: 2rem">Total</th>
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
    <style>
        th {
            font-size: 1.8rem;
            color: black;
        }

        td {
            font-size: 1.7rem;
        }
    </style>
@endsection
