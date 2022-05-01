<div>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>All Sliders</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>All Sliders</li>
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
                                <a class="btn btn-primary" style="margin-bottom:20px;" href="{{route('admin.add_slider')}}">Add New Slider</a>
                                <table class="table table-striped">
                                    <tr>
                                        <td>#</td> 
                                        <td>Image</td>
                                        <td>Title</td>
                                        <td>Status</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>
                                            <img class="icon-img"
                                            src="{{asset('images/sliders')}}/{{$slider->image}}" 
                                            alt="{{$slider->image}}" width="60px">
                                        </td>
                                        <td>{{$slider->title}}</td>
                                        <td>
                                            @if($slider->status)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>{{$slider->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.edit_slider',['id'=>$slider->id])}}"><i class="fa fa-edit text-info" style="margin-left:20px"></i></a>
                                            <a href="" onclick="confirm('Are U Sure Delete This Slider')||event.stopImmediatePropagation();" wire:click.prevent="DeleteSlider({{$slider->id}})"><i class="fa fa-trash text-danger" style="margin-left:20px"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                {{$sliders->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
