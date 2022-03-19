<div>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>{{$category_name}} Services</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>{{$category_name}} Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer">
                            <div class="col-md-12 profile1">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <a class="btn btn-primary" style="margin-bottom:20px;" href="{{route('admin.add_service')}}">Add New Service</a>
                                <table class="table table-striped">
                                    <tr>
                                        <td>#</td>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <td>Price</td>
                                        <!-- <td>Description</td> -->
                                        <td>Status</td>
                                        <td>Category</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach($services as $service)
                                    <tr>
                                        <td>{{$service->id}}</td>
                                        <td>
                                            <img class="icon-img"
                                            src="{{asset('images/services/thumbnails')}}/{{$service->image}}" 
                                            alt="{{$service->image}}" width="80px">
                                        </td>
                                        <td>{{$service->name}}</td>
                                        <td>{{"$ " . number_format($service->price)}}</td>
                                        <!-- <td>{{Str::limit($service->description, 20)}}</td> -->
                                        <td>
                                            @if($service->status)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>{{$service->category->name}}</td>
                                        <td>{{$service->created_at}}</td>
                                        <td>
                                            <a href=""><i class="fa fa-edit text-info"></i></a>
                                            <a href="" onclick="confirm('Are U Sure Delete This Category')||event.stopImmediatePropagation();" wire:click.prevent="DeleteService({{$service->id}})"><i class="fa fa-trash text-danger" style="margin-left:20px"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                {{$services->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
