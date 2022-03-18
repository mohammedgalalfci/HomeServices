<div>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Service Categories</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Admin</a></li>
                            <li>/</li>
                            <li>Service Categories</li>
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
                                <a class="btn btn-primary" style="margin-bottom:20px;" href="{{route('admin.add_service_categories')}}">Add New Service Category</a>
                                <table class="table table-striped">
                                    <tr>
                                        <td>#</td>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <td>Slug</td>
                                    </tr>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>
                                            <img class="icon-img"
                                            src="{{asset('images/categories')}}/{{$category->image}}" 
                                            alt="{{$category->image}}" width="60px">
                                        </td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>