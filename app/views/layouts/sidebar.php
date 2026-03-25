<div class="bg-dark text-white d-flex flex-column p-3"
    style="width:240px; min-height:100vh;"> 

    <h4 class="mb-4"> <i class="bi bi-check-square-fill me-2"></i> TaskManager</h4>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a class="nav-link text-white" href="/dashboard">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <li>
            <a class="nav-link text-white" href="/projects">
                <i class="bi bi-grid-1x2-fill me-2"></i> Projects
            </a>
        </li>

        <li>
            <a class="nav-link text-white" href="/tasks">
                <i class="bi bi-list-task me-2"></i> Tasks
            </a>
        </li>

    </ul>

    <?php if (isset($_SESSION['user'])): ?>

        <hr class="bg-light">

        <div class="mt-auto">

            <div class="small text-light ">
                Logged as
            </div>

            <div class="fw-bold mb-2">
                <?= $_SESSION['user']['name'] ?>
            </div>

            <a class="btn btn-outline-light btn-sm w-100" href="/logout">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>

        </div>

    <?php endif; ?>

</div>