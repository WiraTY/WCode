<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WCode</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/assets/guru/images/logos/faviconwcode.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/guru/css/styles.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/summernote/summernote-lite.min.css') ?>">
    <style type="text/css" media="screen">
        #editor {
            margin: 10px;
            position: absolute;
            top: 80px;
            right: 0;
            bottom: 0;
            left: 0;
        }

        progress {
            border-radius: 2px;
            width: 78.2%;
            height: 12px;
            position: fixed;
            top: 0;
        }

        progress::-webkit-progress-bar {
            background-color: rgba(0, 0, 0, 0.1);
            ;
        }

        progress::-webkit-progress-value {
            background-color: #4F73D9;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <?= $this->include('guru/layout/sidebar'); ?>

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <?= $this->include('guru/layout/header'); ?>
            <div class="swal" data-swal="<?= session()->get('success') ?>"></div>
            <?= $this->renderSection('content'); ?>
            <?= $this->include('guru/layout/footer'); ?>
        </div>

    </div>
    <script defer src="<?= base_url('assets/plugins/fontawesome/js/all.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/js/sidebarmenu.js') ?>"></script>
    <script src="<?= base_url('assets/guru/js/app.min.js') ?>"></script>
    <!-- <script src="<?= base_url('assets/guru/libs/apexcharts/dist/apexcharts.min.js') ?>"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url('assets/guru/libs/simplebar/dist/simplebar.js') ?>"></script>

    <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>

    <script src="<?= base_url('assets/summernote/summernote-lite.min.js') ?>"></script>
    <link href="<?= base_url('assets/summernote/plugin/summernote-add-text-tags.css') ?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/summernote/plugin/summernote-add-text-tags.js') ?>"></script>
    <script src="<?= base_url('assets/summernote/plugin/summernote-ext-specialchars.js') ?>"></script>
    <link href="<?= base_url('assets/summernote/plugin/summernote-list-styles-bs4.css') ?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/summernote/plugin/summernote-list-styles-bs4.js') ?>"></script>
    <link href="<?= base_url('assets/summernote/plugin/table/summernote-ext-table.css') ?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/summernote/plugin/table/summernote-ext-table.js') ?>"></script>
    <script src="<?= base_url('assets/summernote/plugin/summernote-image-attributes-master/bootstrap5/summernote-image-attributes.js') ?>"></script>

    <script>
        $('.summernote_kuis').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload0(files[i]);
                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
            placeholder: '',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['undo', 'redo', 'style']],
                ['font', ['bold', 'underline', 'clear']],
                ['height', ['height', 'add-text-tags', 'specialchars', 'listStyles']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ]
            },
            dialogsInBody: true,
        });
        $.upload0 = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('.summernote_kuis').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
        $('.summernote_a').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.uploada(files[i]);
                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
            placeholder: 'Jawaban A',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['undo', 'redo', 'style']],
                ['font', ['bold', 'underline', 'clear']],
                ['height', ['height', 'add-text-tags', 'specialchars', 'listStyles']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ]
            },
            dialogsInBody: true,
        });
        $.uploada = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('.summernote_a').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
        $('.summernote_b').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.uploadb(files[i]);
                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
            placeholder: 'Jawaban B',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['undo', 'redo', 'style']],
                ['font', ['bold', 'underline', 'clear']],
                ['height', ['height', 'add-text-tags', 'specialchars', 'listStyles']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ]
            },
            dialogsInBody: true,
        });
        $.uploadb = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('.summernote_b').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
        $('.summernote_c').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.uploadc(files[i]);
                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
            placeholder: 'Jawaban C',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['undo', 'redo', 'style']],
                ['font', ['bold', 'underline', 'clear']],
                ['height', ['height', 'add-text-tags', 'specialchars', 'listStyles']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ]
            },
            dialogsInBody: true,
        });
        $.uploadc = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('.summernote_c').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
        $('.summernote_d').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.uploadd(files[i]);
                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
            placeholder: 'Jawaban D',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['undo', 'redo', 'style']],
                ['font', ['bold', 'underline', 'clear']],
                ['height', ['height', 'add-text-tags', 'specialchars', 'listStyles']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ]
            },
            dialogsInBody: true,
        });
        $.uploadd = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('.summernote_d').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
        $('.summernote_e').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.uploade(files[i]);
                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
            placeholder: 'Jawaban E',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['undo', 'redo', 'style']],
                ['font', ['bold', 'underline', 'clear']],
                ['height', ['height', 'add-text-tags', 'specialchars', 'listStyles']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ]
            },
            dialogsInBody: true,
        });
        $.uploade = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('.summernote_e').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };

        $('.summernote').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
            placeholder: '',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['undo', 'redo', 'style']],
                ['font', ['bold', 'underline', 'clear']],
                ['height', ['height', 'add-text-tags', 'specialchars', 'listStyles']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ]
            },
            jTable: {
                /**
                 * drag || dialog
                 */
                mergeMode: 'drag'
            },
            codemirror: { // codemirror options
                mode: 'text/html',
                theme: 'monokai',
                htmlMode: true,
                lineNumbers: true,
                theme: 'default',
                lineWrapping: true
            },
            dialogsInBody: true,
        });
        $.upload = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('.summernote').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };

        $.delete = function(src) {
            $.ajax({
                method: 'POST',
                url: '<?php echo base_url('materi/deleteGambar') ?>',
                cache: false,
                data: {
                    src: src
                },
                success: function(response) {
                    console.log(response);
                }

            });
        };

        function konfirmasi(url) {
            var result = confirm("Want to delete?");
            if (result) {
                window.location.href = url;
            }
        }
    </script>

    <script src="<?= base_url('assets/guru/js/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/js/script.js') ?>"></script>


</body>

</html>