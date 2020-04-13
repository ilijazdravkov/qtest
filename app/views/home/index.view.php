<section class="hero-wrap js-fullheight" style="height: 199px;">
    <div class="container">
        <div class="alert alert-info" role="alert">
            <div>Welcome, <?php echo \Core\Session::get('userName')?></div>
        </div>
        <div class="row description js-fullheight align-items-center justify-content-center" style="height: 199px;">

            <div class="col-md-8 text-center">
                <div class="text">
                    <h1>Search</h1>
                    <form class="input-group" method="GET" action="search">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" required>
                        <input class="form-control mr-sm-2" type="hidden" name="page" value="1">
                        <input class="form-control mr-sm-2" type="hidden" name="show" value="10" required>
                        <input id="submit" type="submit" value="Search" class="btn btn-warning my-2 my-sm-0">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>