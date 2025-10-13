@extends('Admin-panel.Partial.Layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Bannar</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="bannar">Bannar</label>
                                    <input type="file" class="form-control" name="bannar" id="bannar" />
                                    @error('bannar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img id="bannar-preview" src="" alt="bannar Preview"
                                        style="display: none; max-width: 200px; max-height: 200px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                </div>

                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="Submit" class="btn btn-success" value="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#bannar').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#bannar-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#bannar-preview').hide();
                }
            });
        });
    </script>
@endsection
