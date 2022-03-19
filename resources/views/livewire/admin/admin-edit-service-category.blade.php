<div>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Edit Service Category</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Edit Service Category</li>
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
                            <div class="col-md-6 profile1 align-self-center" style="margin-left:25%;">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <a class="btn btn-primary" style="margin:0px 0px 15px 78%" href="{{route('admin.service_categories')}}">All Categories</a>
                                <form method="POST" wire:submit.prevent="UpdateCategory">  
                                    @csrf                                      
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input id="name" type="text" class="form-control" name="cat_name" wire:model="cat_name" wire:keyup="generateSlug" required="" autofocus="">
                                        @error('cat_name') <p class="text-danger">{{message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Category Slug</label>
                                        <input id="name" type="text" class="form-control" name="cat_slug" wire:model="cat_slug"  required="" autofocus="">
                                        @error('cat_slug') <p class="text-danger">{{message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Category Image</label>
                                        <input id="image" type="file" accept="image/*" class="form-control" name="image" wire:model="newImage" required="" autofocus="">
                                        @error('newImage') <p class="text-danger">{{message}}</p>@enderror
                                        @if($newImage)
                                            <img src="{{$newImage->temporaryUrl()}}" alt="" width="60px">
                                        @else
                                            <img src="{{asset('images/categories')}}/{{$image}}" alt="" width="60px">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-info">update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

