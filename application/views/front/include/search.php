<div class="widget-sidebar sidebar-search">
    <h5 class="sidebar-title">Search</h5>
    <div class="sidebar-content">
        <form method="get" action="<?php echo base_url('anasayfa/aramalar'); ?>">
            <div class="input-group">
                <input type="text" name="search" placeholder="

                        <?php if (isset($_GET['search'])) { ?>

                          <?php echo $_GET['search'];
                                } else echo "Arama için ..."; ?> ">
                
                <span class="input-group-btn">
                    <button class="btn btn-secondary btn-search" type="submit">
                <span class="ion-android-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
