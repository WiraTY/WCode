<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WCode</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/assets/guru/images/logos/faviconwcode.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/guru/css/styles.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style type="text/css" media="screen">
        body {
            background-image: url('../../../../assets/guru/images/backgrounds/templatemo-wave-banner.jpg'), linear-gradient(#348CD2, #FFFFFF);
            background-repeat: no-repeat;
            background-size: 108% 46%;
            background-position: top;
        }

        .site-footer {
            background-image: url('../../../../assets/guru/images/backgrounds/templatemo-wave-footer.jpg'), linear-gradient(#FFFFFF, #348CD2);
            background-repeat: no-repeat;
            background-size: 108% 46%;
            background-position: bottom;
        }

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

        .opened {
            background-color: #4F73D9;
            /* Warna latar belakang untuk materi yang sudah dibuka */
        }

        .opened-text {
            color: #ffffff !important;
            ;
            /* Warna font putih */
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <?= $this->include('siswa/layout/sidebar'); ?>

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <?= $this->include('siswa/layout/header'); ?>
            <div class="swal" data-swal="<?= session()->get('success') ?>"></div>
            <section class="hero-section"></section>
            <?= $this->renderSection('content'); ?>
            <?= $this->include('siswa/layout/footer'); ?>
        </div>
    </div>

    <script defer src="<?= base_url('assets/plugins/fontawesome/js/all.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/js/sidebarmenu.js') ?>"></script>
    <script src="<?= base_url('assets/guru/js/app.min.js') ?>"></script>
    <script src="<?= base_url('assets/guru/libs/simplebar/dist/simplebar.js') ?>"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
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
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'imageList', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            dialogsInBody: true,
            imageList: {
                endpoint: "<?php echo site_url('materi/listGambar') ?>",
                fullUrlPrefix: "<?php echo base_url('uploads/berkas') ?>/",
                thumbUrlPrefix: "<?php echo base_url('uploads/berkas') ?>/"
            }
        });
        $.upload = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo site_url('materi/uploadGambar') ?>',
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
                url: '<?php echo site_url('materi/deleteGambar') ?>',
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

    <script>
        const timer = {
            pomodoro: 10, //  detik untuk pomodoro (sesuaikan sesuai kebutuhan)
            shortBreak: 5, //  detik untuk istirahat singkat (sesuaikan sesuai kebutuhan)
            longBreak: 7, //  menit untuk istirahat panjang (dikonversi ke detik)
            longBreakInterval: 2,
            sessions: 0,
            remainingTime: {
                total: 0,
                minutes: 0,
                seconds: 0,
            },
            mode: 'pomodoro',
        };

        let interval;

        const mainButton = document.getElementById('js-btn');
        mainButton.addEventListener('click', () => {
            const {
                action
            } = mainButton.dataset;
            if (action === 'Start') {
                startTimer();
                showSweetAlert('Mulai Belajar', 'Selamat belajar!', 'success');
            } else {
                stopTimer();

                function stopTimer() {
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin menghentikan timer?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            clearInterval(interval);

                            mainButton.dataset.action = 'Start';
                            mainButton.textContent = 'Start';
                            mainButton.classList.remove('active');

                            localStorage.removeItem('endTime');
                            localStorage.removeItem('remainingTime');
                            localStorage.setItem('timerMode', timer.mode);

                            showSweetAlert('Timer Dihentikan', '', 'warning');
                        }
                    });
                }
            }
        });

        const modeButtons = document.querySelector('#js-mode-buttons');
        modeButtons.addEventListener('click', handleMode);

        function getRemainingTime(endTime) {
            const currentTime = Date.parse(new Date());
            const difference = endTime - currentTime;

            const total = Math.max(0, Math.floor(difference / 1000)); // Konversi ke detik
            const minutes = Math.floor(total / 60); // Hitung menit berdasarkan total detik
            const seconds = total % 60; // Ambil sisa detik

            return {
                total,
                minutes,
                seconds,
            };
        }

        function startTimer() {
            let {
                total
            } = timer.remainingTime;

            if (total <= 0) {
                total = timer[timer.mode];
            }

            const endTime = Date.parse(new Date()) + total * 1000; // Perbarui ini menjadi *1000 untuk mengonversi ke detik

            if (timer.mode === 'pomodoro') timer.sessions++;

            mainButton.dataset.action = 'Stop';
            mainButton.textContent = 'Stop';
            mainButton.classList.add('active');

            interval = setInterval(function() {
                timer.remainingTime = getRemainingTime(endTime);
                updateClock();

                // Save remaining time to localStorage
                localStorage.setItem('remainingTime', JSON.stringify(timer.remainingTime));

                total = timer.remainingTime.total;
                if (total <= 0) {
                    clearInterval(interval);

                    if (timer.sessions % timer.longBreakInterval === 0 && timer.mode === 'pomodoro') {
                        // Jika sudah 4 sesi pomodoro, beralih ke istirahat panjang
                        switchMode('longBreak');
                    } else {
                        // Jika belum, beralih antara istirahat singkat dan pomodoro
                        switchMode(timer.mode === 'pomodoro' ? 'shortBreak' : 'pomodoro');
                    }
                    // updatePomodoroData(timer);
                    if (timer.mode === 'pomodoro') {
                        updateBreakTime(timer);
                    } else {
                        updateStudyTime(timer);
                    }

                    const text = timer.mode === 'pomodoro' ? 'Belajar' : 'Beristirahat';
                    showSweetAlert('Sesi ' + (timer.mode === 'pomodoro' ? 'Beristirahat' : 'Belajar') + ' Sudah Selesai', 'Selamat ' + text + '!', 'info');


                    // Clear the remaining time from localStorage
                    localStorage.removeItem('remainingTime');

                    // Simpan nilai timer.sessions ke dalam localStorage
                    localStorage.setItem('sessions', timer.sessions);

                    startTimer();
                }
            }, 1000);

            // Set the end time in localStorage
            localStorage.setItem('endTime', endTime.toString());

            // Save the timer mode in localStorage
            localStorage.setItem('timerMode', timer.mode);
        }

        function stopTimer() {
            clearInterval(interval);

            mainButton.dataset.action = 'Start';
            mainButton.textContent = 'Start';
            mainButton.classList.remove('active');

            // showSweetAlert('Timer Dihentikan', '', 'warning');

            // Remove the end time from localStorage
            localStorage.removeItem('endTime');

            // Remove the remaining time from localStorage
            localStorage.removeItem('remainingTime');

            // Save the timer mode in localStorage
            localStorage.setItem('timerMode', timer.mode);
        }

        function updateClock() {
            const {
                remainingTime
            } = timer;
            const minutes = `${remainingTime.minutes}`.padStart(2, '0');
            const seconds = `${remainingTime.seconds}`.padStart(2, '0');

            const min = document.getElementById('js-minutes');
            const sec = document.getElementById('js-seconds');
            min.textContent = minutes;
            sec.textContent = seconds;

            const text = timer.mode === 'pomodoro' ? 'Selamat Belajar!' : 'Beristirahat lah!';
            document.title = `${minutes}:${seconds} — ${text}`;

            // const progress = document.getElementById("js-progress");
            // const progressValue = timer[timer.mode] - timer.remainingTime.total;
            // progress.value = progressValue;

        }

        // Deklarasikan variabel di luar fungsi
        let modeAlertShown = {};

        function switchMode(mode) {
            const previousMode = timer.mode;
            timer.mode = mode;
            timer.remainingTime = {
                total: timer[mode],
                minutes: Math.floor(timer[mode] / 60),
                seconds: timer[mode] % 60,
            };

            // Check if sweetalert was shown previously
            // const modeAlertShown = sessionStorage.getItem('modeAlertShown');

            // if (!modeAlertShown || modeAlertShown !== `${previousMode}-${mode}`) {
            //     showSweetAlert('Mode Diganti', `Mode diganti dari ${previousMode} ke ${mode}`, 'success');
            //     // Save status in sessionStorage
            //     sessionStorage.setItem('modeAlertShown', `${previousMode}-${mode}`);
            // }

            document
                .querySelectorAll('button[data-mode]')
                .forEach((e) => e.classList.remove('active'));
            document.querySelector(`[data-mode="${mode}"]`).classList.add('active');
            document.body.style.backgroundColor = `var(--${mode})`;
            // document
            //     .getElementById('js-progress')
            //     .setAttribute('max', timer.remainingTime.total);

            // Save the timer mode in localStorage
            localStorage.setItem('timerMode', timer.mode);

            // Move updateClock here
            updateClock();
        }

        function handleMode(event) {
            const {
                mode
            } = event.target.dataset;

            if (!mode) return;

            switchMode(mode);
            stopTimer();
        }

        document.addEventListener('DOMContentLoaded', () => {
            const storedEndTime = localStorage.getItem('endTime');
            const storedRemainingTime = localStorage.getItem('remainingTime');
            const storedTimerMode = localStorage.getItem('timerMode');

            // Inisialisasi objek timer dengan nilai dari localStorage
            timer.mode = storedTimerMode || 'pomodoro';
            timer.remainingTime = storedRemainingTime ?
                JSON.parse(storedRemainingTime) : {
                    total: timer[timer.mode],
                    minutes: Math.floor(timer[timer.mode] / 60),
                    seconds: timer[timer.mode] % 60,
                };

            // Baca nilai sessions dari localStorage
            timer.sessions = parseInt(localStorage.getItem('sessions')) || 0;

            if (storedEndTime) {
                // Calculate remaining time from stored end time
                const endTime = parseInt(storedEndTime);
                timer.remainingTime = getRemainingTime(endTime);

                // Check if the timer was active
                if (timer.remainingTime.total > 0) {
                    mainButton.dataset.action = 'Stop';
                    mainButton.textContent = 'Stop';
                    mainButton.classList.add('active');

                    // Start the timer with the remaining time
                    startTimer();
                } else {
                    // Timer has completed, remove stored end time
                    localStorage.removeItem('endTime');
                }
            } else {
                // If no stored end time, set the mode from localStorage
                if (storedTimerMode) {
                    switchMode(storedTimerMode);
                } else {
                    // Jika tidak ada mode yang disimpan, atur mode pertama sebagai pomodoro
                    switchMode('pomodoro');
                }
            }
        });

        window.addEventListener('beforeunload', function() {
            localStorage.removeItem('modeAlertShown');
        });

        function updatePomodoroData(timer) {
            const data = {
                timer: timer,
            };

            fetch('<?= base_url('update-pomodoro-data') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
        }
    </script>

    <script>
        function updateStudyTime(timer) {
            const data = {
                timer: timer,
            };

            fetch('<?= base_url('update-study-time') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });
        }

        function updateBreakTime(timer) {
            const data = {
                timer: timer,
            };

            fetch('<?= base_url('update-break-time') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });
        }
    </script>

    <script>
        function showSweetAlert(title, text, icon) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
            });
        }
    </script>


</body>

</html>