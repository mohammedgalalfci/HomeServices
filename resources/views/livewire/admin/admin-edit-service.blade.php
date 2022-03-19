<div>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Edit Service</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Edit Service</li>
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
                                <a class="btn btn-primary" style="margin:0px 0px 15px 78%" href="{{route('admin.services')}}">All Services</a>
                                <form method="POST" wire:submit.prevent="UpdateService">  
                                    @csrf                                      
                                    <div class="form-group">
                                        <label for="name">Service Name</label>
                                        <input id="name" type="text" class="form-control" name="name" wire:model="name" wire:keyup="generateSlug"  autofocus="">
                                        @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Service Slug</label>
                                        <input id="name" type="text" class="form-control" name="slug" wire:model="slug"   autofocus="">
                                        @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tageline">Service Tagline</label>
                                        <input id="tagline" type="text" class="form-control" name="tagline" wire:model="tagline"   autofocus="">
                                        @error('tagline') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Service Category</label>
                                        <select name="category" id="category" wire:model="service_category_id" class="form-control">
                                            <option value="">Select Service Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('service_category_id') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Service Price</label>
                                        <input id="price" type="number" class="form-control" name="price" wire:model="price"   autofocus="">
                                        @error('price') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Service Discount</label>
                                        <input id="discount" type="number" class="form-control" name="discount" wire:model="discount"   autofocus="">
                                        @error('discount') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_type">Service Discount Type</label>
                                        <select name="discount_type" id="discount_type" wire:model="discount_type" class="form-control">
                                            <option value="">Select Discount Type</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">Percent</option>
                                        </select>
                                        @error('discount_type') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Service Description</label>
                                        <textarea name="description" id="description" class="form-control" wire:model="description"  autofocus=""></textarea>
                                        @error('description') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inclusion">Service Inclusion</label>
                                        <textarea name="inclusion" id="inclusion" class="form-control" wire:model="inclusion"  autofocus=""></textarea>
                                        @error('inclusion') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exclusion">Service Exclusion</label>
                                        <textarea name="exclusion" id="exclusion" class="form-control" wire:model="exclusion"  autofocus=""></textarea>
                                        @error('exclusion') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="newThumbnail">Service Thumbnail</label>
                                        <input id="newThumbnail" type="file" accept="image/*" class="form-control" name="newThumbnail" wire:model="newThumbnail"  autofocus="">
                                        @error('newThumbnail') <p class="text-danger">{{$message}}</p>@enderror
                                        @if($newThumbnail)
                                            <img src="{{$newThumbnail->temporaryUrl()}}" alt="" width="60px">
                                        @else
                                            <img src="{{asset('images/services/thumbnails')}}/{{$thumbnail}}" alt="" width="60px">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="newImage">Service Image</label>
                                        <input id="newImage" type="file" accept="image/*" class="form-control" name="newImage" wire:model="newImage"  autofocus="">
                                        @error('newImage') <p class="text-danger">{{$message}}</p>@enderror
                                        @if($newImage)
                                            <img src="{{$newImage->temporaryUrl()}}" alt="" width="60px">
                                        @else
                                            <img src="{{asset('images/services')}}/{{$image}}" alt="" width="60px">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-info">Update Service</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>


