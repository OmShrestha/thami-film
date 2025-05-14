<!-- Image LFM Modal -->
<div class="modal fade lfm-modal" id="lfmModal1" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
    <i class="fas fa-times-circle"></i>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <iframe src="{{url('laravel-filemanager')}}?serial=1"
                        style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Gallery LFM Modal -->
<div class="modal fade lfm-modal" id="lfmModal2" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
    <i class="fas fa-times-circle"></i>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <iframe id="lfmIframe2" src="{{url('laravel-filemanager')}}?serial=2"
                        style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    //Specifications for Vehicles
    document.addEventListener('DOMContentLoaded', function () {
        const specificationsArea = document.getElementById('specificationsArea');
        document.getElementById('addSpecification').addEventListener('click', function () {
            const index = specificationsArea.children.length;
            const specDiv = document.createElement('div');
            specDiv.classList.add('row', 'mb-2');
            specDiv.innerHTML = `
            <div class="col-lg-3 pr-1">
                <input type="text" class="form-control" name="specifications[${index}][key]" placeholder="Key (eg. Engine Type)">
            </div>
            <div class="col-lg-8 px-1">
                <input type="text" class="form-control" name="specifications[${index}][value]" placeholder="Value (eg. Petrol)">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-danger btn-sm removeSpecification"><i class="fas fa-times"></i></button>
            </div>
        `;
            specificationsArea.appendChild(specDiv);
        });

        specificationsArea.addEventListener('click', function (e) {
            if (e.target.classList.contains('removeSpecification')) {
                e.target.closest('.row').remove();
            }
        });
    });
</script>
