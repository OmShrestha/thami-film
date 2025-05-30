@extends('admin.layout')

@if(!empty($bs->language) && $bs->language->rtl == 1)
@section('styles')
<style>
    form input,
    form textarea,
    form select {
        direction: rtl;
    }
    form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
  <div class="page-header">
    <h4 class="page-title">SEO Informations</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Basic Settings</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">SEO Informations</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.seo.update', $lang_id)}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-10">
                      <div class="card-title">Update SEO Information</div>
                  </div>
                  <div class="col-lg-2">
                      @if (!empty($langs))
                          <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                              <option value="" selected disabled>Select a Language</option>
                              @foreach ($langs as $lang)
                                  <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                              @endforeach
                          </select>
                      @endif
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              @csrf
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Meta Keywords for Home Page</label>
                  <input class="form-control" name="home_meta_keywords" value="{{$bs->home_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                </div>
                <div class="form-group">
                  <label>Meta Description for Home Page</label>
                  <textarea class="form-control" name="home_meta_description" rows="5" placeholder="Enter meta description">{{$bs->home_meta_description}}</textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Meta Keywords for Services Page</label>
                    <input class="form-control" name="services_meta_keywords" value="{{$bs->services_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for Services Page</label>
                    <textarea class="form-control" name="services_meta_description" rows="5" placeholder="Enter meta description">{{$bs->services_meta_description}}</textarea>
                  </div>
              </div>

              <div class="col-lg-6">
                  <div class="form-group">
                    <label>Meta Keywords for Portfolios</label>
                    <input class="form-control" name="portfolios_meta_keywords" value="{{$bs->portfolios_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for Portfolios</label>
                    <textarea class="form-control" name="portfolios_meta_description" rows="5" placeholder="Enter meta description">{{$bs->portfolios_meta_description}}</textarea>
                  </div>
              </div>

              <div class="col-lg-6">
                  <div class="form-group">
                    <label>Meta Keywords for Team Page</label>
                    <input class="form-control" name="team_meta_keywords" value="{{$bs->team_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for Team Page</label>
                    <textarea class="form-control" name="team_meta_description" rows="5" placeholder="Enter meta description">{{$bs->team_meta_description}}</textarea>
                  </div>
              </div>

              <div class="col-lg-6">
                  <div class="form-group">
                    <label>Meta Keywords for Career Page</label>
                    <input class="form-control" name="career_meta_keywords" value="{{$bs->career_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for Career Page</label>
                    <textarea class="form-control" name="career_meta_description" rows="5" placeholder="Enter meta description">{{$bs->career_meta_description}}</textarea>
                  </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                    <label>Meta Keywords for Gallery Page</label>
                    <input class="form-control" name="gallery_meta_keywords" value="{{$bs->gallery_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for Gallery Page</label>
                    <textarea class="form-control" name="gallery_meta_description" rows="5" placeholder="Enter meta description">{{$bs->gallery_meta_description}}</textarea>
                  </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                    <label>Meta Keywords for FAQ Page</label>
                    <input class="form-control" name="faq_meta_keywords" value="{{$bs->faq_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for FAQ Page</label>
                    <textarea class="form-control" name="faq_meta_description" rows="5" placeholder="Enter meta description">{{$bs->faq_meta_description}}</textarea>
                  </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                    <label>Meta Keywords for Blogs Page</label>
                    <input class="form-control" name="blogs_meta_keywords" value="{{$bs->blogs_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for Blogs Page</label>
                    <textarea class="form-control" name="blogs_meta_description" rows="5" placeholder="Enter meta description">{{$bs->blogs_meta_description}}</textarea>
                  </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                    <label>Meta Keywords for Contact Page</label>
                    <input class="form-control" name="contact_meta_keywords" value="{{$bs->contact_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                  </div>
                  <div class="form-group">
                    <label>Meta Description for Contact Page</label>
                    <textarea class="form-control" name="contact_meta_description" rows="5" placeholder="Enter meta description">{{$bs->contact_meta_description}}</textarea>
                  </div>
              </div>

            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
