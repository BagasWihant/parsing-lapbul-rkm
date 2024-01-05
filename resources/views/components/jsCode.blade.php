    <script>
        var previewNode = document.querySelector("#template");
        previewNode.id = '';
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(".dropzone", {
            maxFilesize: 1,
            uploadMultiple: true,
            autoProcessQueue: false,
            parallelUploads: 100,
            maxFiles: 20,
            acceptedFiles: ".txt",
            previewTemplate: previewTemplate,
            previewsContainer: '#previews',
            dictDefaultMessage: "<b>Ketuk atau seret file disini</b>",
            dictInvalidFileType: "File tipe ini tidak bisa di upload.",
            dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
            dictRemoveFile: "Hapus File",
            dictMaxFilesExceeded: "Sudah melebihi batas upload",
            removedfile: function(file) {
                this.files.length < 1 && $('#clearFile').hide()
                var fileName = file.name;

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },
            init: function() {
                this.on("success", function(file, res) {
                    $('#fileName').val(res)

                    myDropzone.removeFile(file);
                    $('#fileUpload').hide();
                    $('#clearFile').hide()
                    $('#backButton').hide();
                    $('#downloadFile').show();

                });

                this.on('addedfile', function(file) {
                    $('#clearFile').show()
                })
            }
        });

        $('#submitForm').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            if (myDropzone.files.length < 1) return $.notify("Upload file dengan benar dulu ya gaiss..", {
                className: "info"
            });
            myDropzone.processQueue();
        });
        $('#downloadButton').click(function(e) {
            myDropzone.removeAllFiles();
            $('#fileUpload').show();
            $('#downloadFile').hide();
            $('#backButton').show();

        });

        function clearFile() {
            files = myDropzone.files
            files.map(function(file) {
                myDropzone.removeFile(file)
            })
        }
    </script>
