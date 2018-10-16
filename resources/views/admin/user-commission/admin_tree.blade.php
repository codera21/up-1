<?php /*dd($users[0]->children)*/?>
@extends('layouts.backend.default')

@section('page_title')
    {{ trans('app.tree') }}
@endsection

@section('content')
    <br>
    <?php $count = 1?>
    @foreach($admin_user->paginate(3) as $item)
        <h4 style="color: #3a4559;font-weight: 700">
            {{$item->first_name}} {{$item->last_name}}
        </h4>
        <?php $item1 = $item->id;?>
        <?php $admin_user_id = $admin_user->findbyfield('parent_id', $item1); ?>
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
                    @foreach($admin_user_id as $user)
                        <a href="#">{{ $user->first_name }} {{ $user->last_name}}</a>
                        <br>
                    @endforeach
                </td>
                <td>
                    <?php $level_1 = 0; ?>
                    @foreach($admin_user_id as $item)
                        <?php if ($item->is_active == 'YES') {
                            echo '&#9989';
                            $level_1++;
                        } else {
                            echo '&#x274C';
                        }?>
                        <br>
                    @endforeach
                </td>
                <td> @foreach($admin_user_id as $item)
                        <?php if ($item->is_active == 'YES') {
                            echo '$50';
                            echo '<br>';
                        } else {
                            echo 'Not paid';
                            echo '<br>';
                        }?>
                    @endforeach</td>
                <td>
                    @foreach($admin_user_id as $item)
                        <?php if ($item->is_active == 'YES') {
                            echo '$5';
                            echo '<br>';
                        } else {
                            echo 'Not paid';
                            echo '<br>';
                        }?>
                    @endforeach
                </td>
                <td>
                    @foreach($admin_user_id as $user)
                        <a href="#">

                        </a>
                        <br>
                    @endforeach
                </td>
            </tr>
            {{--for level 2--}}
            <tr>
                <th scope="row">2</th>
                <td>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <a href="">{{$second->first_name}} {{$second->last_name}}</a>
                            <br>
                        @endforeach
                    @endforeach
                </td>
                <td>
                    <?php $level_2 = 0?>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php if ($second->is_active == 'YES') {
                                echo '&#9989';
                                $level_2++;
                            } else {
                                echo '&#x274C';
                            }?>
                            <br>
                        @endforeach
                    @endforeach
                </td>
                <td>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php if ($second->is_active == 'YES') {
                                echo '$50';
                            } else {
                                echo 'Not paid';
                            }?>
                            <br>
                        @endforeach
                    @endforeach
                </td>
                <td>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php if ($second->is_active == 'YES') {
                                echo '$5';
                            } else {
                                echo 'Null';
                            }?>
                            <br>
                        @endforeach
                    @endforeach
                </td>
                <td>@foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <a href="#">

                            </a>
                            <br>
                        @endforeach
                    @endforeach</td>
            </tr>
            {{--end of 2 start of 3--}}
            <tr>
                <th scope="row">3</th>
                <td>
                    @foreach($admin_user_id as $user)
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
                    <?php $level_3 = 0; ?>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <?php if ($third->is_active == 'YES') {
                                    echo '&#9989';
                                    $level_3++;
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
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <?php if ($third->is_active == 'YES') {
                                    echo '$50';
                                } else {
                                    echo 'Not paid';
                                }?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                </td>
                <td>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <?php if ($third->is_active == 'YES') {
                                    echo '$5';
                                } else {
                                    echo 'Null';
                                }?>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach
                </td>
                <td>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <a href="#">

                                </a>
                                <br>
                            @endforeach
                        @endforeach
                    @endforeach</td>
            </tr>
            {{--end of 3 start of 4--}}
            <tr>
                <th scope="row">4</th>
                <td>
                    @foreach($admin_user_id as $user)
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
                    <?php $level_4 = 0;?>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <?php $forth_level = $third->children?>
                                @foreach($forth_level as $forth)
                                    <?php if ($forth->is_active == 'YES') {
                                        echo '&#9989';
                                        $level_4++;
                                    } else {
                                        echo '&#x274C';
                                    }?>
                                    <br>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </td>
                <?php $total = $level_3 + $level_4 + $level_2 + $level_1?>
                <td>
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <?php $forth_level = $third->children?>
                                @foreach($forth_level as $forth)
                                    <?php if ($forth->is_active == 'YES') {
                                        echo '$50';
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
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <?php $forth_level = $third->children?>
                                @foreach($forth_level as $forth)
                                    <?php if ($forth->is_active == 'YES') {
                                        echo '$5';
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
                    @foreach($admin_user_id as $user)
                        <?php $second_level = $user->children?>
                        @foreach($second_level as $second)
                            <?php $third_level = $second->children?>
                            @foreach($third_level as $third)
                                <?php $forth_level = $third->children?>
                                @foreach($forth_level as $forth)
                                    <a href="#">

                                    </a>
                                    <br>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </td>
            </tr>
            <tr>
                <th colspan="3" style="text-align: center;font-size: 2rem">Total</th>
                <td>
                    ${{$total*50}}
                </td>
                <td>
                    ${{$total*5}}
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-xs">Payment</button>
                </td>
            </tr>
            </tbody>
        </table>
        <?php $count++?>
    @endforeach
    <div class="text-center">
        {!! $admin_user->paginate(3)->links() !!}
    </div>
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
