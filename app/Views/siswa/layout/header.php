<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row  align-items-center justify-content-end">
                <!-- <progress id="js-progress" value="0"></progress>
                <div class="progress-bar"></div> -->
                <style>
                    .custom-outline-success {
                        border: 1px solid #13DBB7;
                        padding: 0.150rem 0.75rem;
                        border-radius: 0.25rem;
                        color: white;
                        /* Default font color */
                    }

                    .custom-outline-success:hover {
                        border-color: #13DBB7;
                        background-color: transparent;
                    }

                    .dark-mode .custom-outline-success {
                        color: black;
                        /* Font color when scrolled down */
                    }


                    .app-header {
                        position: fixed;
                        top: 0;
                        width: 100%;
                        background-color: rgba(255, 255, 255, 0.3);
                        transition: background-color 0.3s ease;
                        z-index: 1000;
                    }
                </style>

                <div class="custom-outline-success timer fw-semibold">
                    <span id="js-minutes">25</span>
                    <span class="separator">:</span>
                    <span id="js-seconds">00</span>
                    <div class="clock" id="js-clock"></div>
                </div>

                <div class="button-group mode-buttons" id="js-mode-buttons">
                    <div class="dropdown">
                        <button class="btn btn-success m-1 btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i id="selectedIcon" class="fa-solid fa-briefcase" style="color: #ffffff;"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <button type="button" class="btn btn-sm btn-primary m-1 mode-button" data-mode="pomodoro" onclick="changeText('Pomodoro', 'fa-solid fa-briefcase')"><i class="fa-solid fa-briefcase" style="color: #ffffff;"></i> Pomodoro</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-sm btn-warning m-1 mode-button" data-mode="shortBreak" onclick="changeText('Short Break', 'fa-solid fa-hourglass-half')"><i class="fa-solid fa-hourglass-half" style="color: #ffffff;"></i> Short Break</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-sm btn-success m-1 mode-button" data-mode="longBreak" onclick="changeText('Long Break', 'fa-solid fa-hourglass-end')"><i class="fa-solid fa-hourglass-end" style="color: #ffffff;"></i> Long Break</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <script>
                    function changeText(newText, newIconClass) {
                        document.getElementById('selectedIcon').className = 'fa-solid ' + newIconClass;
                    }
                </script>

                <script>
                    window.addEventListener('scroll', function() {
                        var header = document.querySelector('.app-header');
                        if (window.scrollY > 50) { // Change 50 to your desired scroll position
                            header.style.backgroundColor = 'rgba(255, 255, 255, 1)';
                        } else {
                            header.style.backgroundColor = 'rgba(255, 255, 255, 0.3)';
                        }
                    });

                    window.addEventListener('scroll', function() {
                        var header = document.querySelector('.app-header');
                        var buttons = document.querySelectorAll('.custom-outline-success');
                        if (window.scrollY > 50) { // Change 50 to your desired scroll position
                            header.classList.add('dark-mode');
                            buttons.forEach(function(button) {
                                button.classList.add('dark-mode');
                            });
                        } else {
                            header.classList.remove('dark-mode');
                            buttons.forEach(function(button) {
                                button.classList.remove('dark-mode');
                            });
                        }
                    });
                </script>

                <button type="button" class="btn btn-sm btn-success m-1 start-button" data-action="Start" id="js-btn">Start</button>

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url('../assets/guru/images/profile/user-1.jpg') ?>" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <span><?= user()->username ?></span>
                            </a>
                            <a href="<?= base_url('logout') ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->