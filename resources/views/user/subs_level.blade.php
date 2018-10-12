<?php /*dd($users[0]->children)*/?>
@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('app.tree') }}
@endsection

@section('content')
    <br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Level</th>
            <th scope="col">Subscribers</th>
            <th scope="col">Status</th>
            <th scope="col">Total fees</th>
            <th scope="col">Total commissions</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>
                @foreach($users as $user)
                    <a href="#">{{ $user->first_name }} {{ $user->last_name}}</a>
                    <br>
                @endforeach
            </td>
            <td>    @foreach($users as $user)
                    <?php if ($user->is_active == 'YES'){
                    echo '&#9989';
                    }
                    else{
                    echo '&#x274C';
                    }?>
                    <br>
                @endforeach  </td>
            <td>$500</td>
            <td>$500</td>
            <td>
                @foreach($users as $user)
                    <a href="#"><button type="button" class="btn btn-primary btn-xs">Payment</button>
                    </a>
                    <br>
                @endforeach

            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
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
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                            <?php if ($second->is_active == 'YES'){
                                echo '&#9989';
                            }
                            else{
                                echo '&#x274C';
                            }?>
                        <br>
                    @endforeach
                @endforeach
               </td>
            <td>$500</td>
            <td>$500</td>
            <td>@foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                            <a href="#"><button type="button" class="btn btn-primary btn-xs">Payment</button></a>
                        <br>
                    @endforeach
                @endforeach</td>
        </tr>
        <tr>
            <th scope="row">3</th>
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
            <td>  @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                                <?php if ($third->is_active == 'YES'){
                                    echo '&#9989';
                                }
                                else{
                                    echo '&#x274C';
                                }?>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach</td>
            <td>$500</td>
            <td>$500</td>
            <td> @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                                <a href="#"><button type="button" class="btn btn-primary btn-xs">Payment</button></a>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach</td>
        </tr>
        <tr>
            <th scope="row">4</th>
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
            <td> @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                    <?php if ($forth->is_active == 'YES'){
                                        echo '&#9989';
                                    }
                                    else{
                                        echo '&#x274C';
                                    }?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach</td>
            <td>$500</td>
            <td>$500</td>
            <td> @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                    <a href="#"><button type="button" class="btn btn-primary btn-xs">Payment</button></a>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach</td>
        </tr>
        <tr>
            <th colspan="3" style="text-align: center;font-size: 2rem">Total</th>
            <td>@$2000</td>
            <td>$2000</td>

        </tr>
        </tbody>
    </table>
    <style>
        th{
            font-size: 1.8rem;
            color:black;
        }
        td{
            font-size: 1.7rem;
        }
    </style>
@endsection
