@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Commission') }}
@endsection

@section('content')



    <br>
    @if($count !=0)
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
            <td>
                <?php $one = 0?>
                @foreach($users as $user)
                    <?php
                    if ($user->is_active == 'YES') {
                        echo '&#9989';
                        $one++;
                    } else {
                        echo '&#x274C';
                    }?>
                    <br>
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php
                    if ($user->is_active == 'YES') {
                        echo 'F250';
                    } else {
                        echo 'Not paid';
                    }?>
                    <br>
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php
                    if ($user->is_active == 'YES') {
                        echo 'F25';
                    } else {
                        echo 'Null';
                    }?>
                    <br>
                @endforeach
            </td>
            <td>
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
                <?php $two = 0 ?>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php if ($second->is_active == 'YES') {
                            echo '&#9989';
                            $two++;
                        } else {
                            echo '&#x274C';
                        }?>
                        <br>
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php if ($second->is_active == 'YES') {
                            echo 'F250';
                        } else {
                            echo 'Not paid';
                        }?>
                        <br>
                    @endforeach
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php if ($second->is_active == 'YES') {
                            echo 'F25';
                        } else {
                            echo 'Null';
                        }?>
                        <br>
                    @endforeach
                @endforeach
            </td>
            <td>

            </td>
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
            <td>
                <?php $three = 0?>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php if ($third->is_active == 'YES') {
                                echo '&#9989';
                                $three++;
                            } else {
                                echo '&#x274C';
                            }?>
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
                            <?php if ($third->is_active == 'YES') {
                                echo 'F250';
                            } else {
                                echo 'Not paid';
                            }?>
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
                            <?php if ($third->is_active == 'YES') {
                                echo 'F25';
                            } else {
                                echo 'Null';
                            }?>
                            <br>
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>
            </td>
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
            <td>
                <?php $four = 0?>
                @foreach($users as $user)
                    <?php $second_level = $user->children?>
                    @foreach($second_level as $second)
                        <?php $third_level = $second->children?>
                        @foreach($third_level as $third)
                            <?php $forth_level = $third->children?>
                            @foreach($forth_level as $forth)
                                <?php if ($forth->is_active == 'YES') {
                                    echo '&#9989';
                                    $four++;
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
                                <?php if ($forth->is_active == 'YES') {
                                    echo 'F250';
                                } else {
                                    echo 'Not paid';
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
                                <?php if ($forth->is_active == 'YES') {
                                    echo 'F25';
                                } else {
                                    echo 'Null';
                                }?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </td>
            <td>

            </td>
        </tr>
        <?php $total = $one+$two+$three+$four;?>
        <tr>
            <th colspan="3" style="text-align: center;font-size: 2rem">Total</th>
            <td>
                F{{$total*250}}
            </td>
            <td>
                F{{$total*25}}
            </td>
            <td>
                <button type="button" class="btn btn-primary btn-xs">Payment</button>
            </td>
        </tr>
        </tbody>
    </table>
    @else
        <h1>User don't have any subscriber</h1>
        @endif
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
