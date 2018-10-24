@extends('avored-framework::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="h1">Menu</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-6">
                        <div class="h4">Categories List</div>
                        <ul class="left-menu list-group ">

                            @foreach($categories as $category)
                                <li class="list-group-item mb-2"
                                    data-route="category.view"
                                    data-params="{{ $category->slug }}"
                                    data-name="{{ $category->name }}"
                                >
                                    <i class="ti-menu-alt"></i>
                                    <a href="#"
                                       data-route="{{ route('category.view', $category->slug) }}">{{ $category->name }}</a>
                                    <span class="float-right">
                                    <a href="#" class="destroy-menu"><i class="ti-trash"></i> </a>
                                </span>
                                </li>
                            @endforeach

                        </ul>
                        <div class="h4">Front Menu List</div>
                        <ul class="left-menu list-group ">

                            @foreach($frontMenus as $frontMenu)
                                <li class="list-group-item mb-2"
                                    data-route="{{ $frontMenu->route() }}"
                                    data-params="{{ $frontMenu->params() }}"
                                    data-name="{{ $frontMenu->label() }}"
                                >
                                    <i class="ti-menu-alt"></i>
                                    <a href="#"
                                       data-route="{{ route($frontMenu->route()) }}"
                                    >{{ $frontMenu->label() }}</a>
                                    <span class="float-right">
                                    <a href="#" class="destroy-menu"><i class="ti-trash"></i> </a>
                                </span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                <ul id='menu-nav-list' class="nav nav-tabs nav-fill">
                    <li class="nav-item ">
                        <a class="nav-link bg-primary text-white active" 
                            data-toggle="tab" 
                            href="#front-menu">Front Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"  href="#add-menu-group">
                            <i class='ti-plus'>&nbsp;</i>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="front-menu">
                        @include('avored-framework::cms.menu.menu-tree')
                    </div>
                    <div class="tab-pane fade" id="add-menu-group">
                        <h2>Add New Menu Group</h2>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('admin.menu.store') }}" class="mt-3" method="post">
                    @csrf
                    <input type="hidden" name="menu_json" id="menu-list" value=""/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
