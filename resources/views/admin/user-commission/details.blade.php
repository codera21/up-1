<?php /*dd($users[0]->children)*/?>
@extends('layouts.backend.default')
<style>
    .myTable > tbody > .myTableRow > td {
        padding: 0px;
        border-top: 1px solid #959ead;
    }

    .myTable > tbody > .myTableRow > th {
        padding: 0px;
        border-top: 1px solid #959ead;
    }
</style>
@section('page_title')
    {{ trans('app.tree') }}
@endsection

@section('content')
    <br>
    <?php if ($count): ?>
    <table class="table myTable">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Level</th>
            <th scope='col'>SN</th>
            <th scope="col">Subscribers</th>
            <th scope="col">Status</th>
            <th scope="col">Total fees</th>
            <th scope="col">Total commissions</th>
        </tr>
        </thead>
        <tbody>
        <tr class="myTableRow">
            <td colspan="6"></td>
        </tr>

        {{-- 8888888888888888888888888888888888888   Level one    88888888888888888888888888888888888888888888888888888888--}}

        @foreach($users as $user):
        <?php $firstLevelCount = 1; $firstLevelSnCount = 1;$one = 0;?>
        <tr class="myTableRow">
            <th scope="row">{{$firstLevelCount}}</th>
            <td>{{$firstLevelSnCount}}</td>
            <td>{{ $user->first_name }} {{ $user->last_name}}</td>
            <td><?php
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
                ?></td>
            <td><?php
                if ($user->not_now == 0) {
                    if ($user->is_active == 'YES') {
                        echo $amount;
                    } else {
                        echo 'Not paid';
                    }
                } else {
                    echo 'Not paid';
                }
                ?></td>
            <td><?php
                if ($user->not_now == 0) {
                    if ($user->is_active == 'YES') {
                        echo $comm;
                    } else {
                        echo '0';
                    }
                } else {
                    echo '0';
                }
                ?></td>
        </tr>
        <?php $firstLevelSnCount++;$firstLevelCount = null; ?>
        @endforeach
        {{-- 8888888888888888888888888888888888888   Level two    88888888888888888888888888888888888888888888888888888888--}}
        <tr class="">
            <td colspan="6"></td>
        </tr>
        <?php $secondLevelSnCount = 1;$secondLevelCount = 2;$two = 0?>
        @foreach($users as $user)
            <?php $second_level = $user->children;?>
            @foreach($second_level as $second)
                <tr class="myTableRow">
                    <th scope="row">{{$secondLevelCount}}</th>
                    <td>{{$secondLevelSnCount}}</td>
                    <td>{{$second->first_name}} {{$second->last_name}}</td>
                    <td>
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
                    </td>
                    <td><?php
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
                    <td><?php if ($second->not_now == 0) {
                            if ($second->is_active == 'YES') {
                                echo $comm;
                            } else {
                                echo '0';
                            }
                        } else {
                            echo '0';
                        }
                        ?>
                    </td>
                </tr>
                <?php $secondLevelSnCount++;
                $secondLevelCount = null;
                ?>
            @endforeach
        @endforeach
        {{-- 8888888888888888888888888888888888888   Level three    88888888888888888888888888888888888888888888888888888888--}}
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
                    </tr>
                    <?php $levelThree = "" ?>
                @endforeach
            @endforeach
        @endforeach
        {{-- 8888888888888888888888888888888888888   Level four    88888888888888888888888888888888888888888888888888888888--}}
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
                        </tr>

                        <?php $levelFour = ""; $count3++;  ?>
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
        {{-- 8888888888888888888888888888888888888   Total    88888888888888888888888888888888888888888888888888888888--}}
        <?php $total = $one + $two + $three + $four ?>
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
        </tr>
        </tbody>
    </table>
    <?php else:?>
    <table class="table myTable">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Level</th>
            <th scope='col'>SN</th>
            <th scope="col">Subscribers</th>
            <th scope="col">Status</th>
            <th scope="col">Total fees</th>
            <th scope="col">Total commissions</th>
        </tr>
        </thead>
        <tbody>
        <tr class="myTableRow">
            <td colspan="6"></td>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr class="myTableRow">
            <td colspan="6"></td>
        </tr>
        <tr>
            <th colspan="6" style="text-align: center">User dont have any subscriber</th>
        </tr>
        <tr class="myTableRow">
            <td colspan="6"></td>
        </tr>
    </table>
    <?php endif; ?>
@endsection
