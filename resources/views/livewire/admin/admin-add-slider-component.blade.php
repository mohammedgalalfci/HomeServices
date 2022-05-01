<div>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Add Slider</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Add Slider</li>
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
                                <a class="btn btn-primary" style="margin:0px 0px 15px 78%" href="{{route('admin.sliders')}}">All Sliders</a>
                                <form method="POST" wire:submit.prevent="createSlider">  
                                    @csrf                                      
                                    <div class="form-group">
                                        <label for="title">Slider Title</label>
                                        <input id="title" type="text" class="form-control" name="title" wire:model="title" autofocus="">
                                        @error('title') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Slider Image</label>
                                        <input id="image" type="file" accept="image/*" class="form-control" name="image" wire:model="image" autofocus="">
                                        @error('image') <p class="text-danger">{{$message}}</p>@enderror
                                        @if($image)
                                            <img src="{{$image->temporaryUrl()}}" alt="" width="60px">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_type">Slider Status</label>
                                        <select name="status" id="status" wire:model="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Add Slider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

