<section class="ftco-section ftco-section-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2 class="heading-section mb-4 pb-md-3">
                    Search results
                </h2>

                <?php
                if(isset($errors)){
                    foreach ($errors as $error) {
                        ?>
                        <div class="invalid-feedback" style="display: block">
                            <?php echo $error; ?>
                        </div>
                        <?php
                    }
                }
                ?>

                <?php
                if(isset($users))
                {
                ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user){ ?>
                        <tr>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->email; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php
                }elseif(!isset($errors)){
                    ?>
                    <div>No result found.</div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>