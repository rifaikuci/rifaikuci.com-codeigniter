<div class="skill-mf">
    <p class="title-s">Becerilerim</p>

    <?php foreach (ozellik4() as $ozellik) { ?>

        <span>
      <?php echo $ozellik['ozellik']; ?>
        </span>

        <span class="pull-right">
          <?php echo $ozellik['puan']; ?>%
        </span>

        <div class="progress">
            <div
                    class="progress-bar" role="progressbar" style="width: <?php echo $ozellik['puan']; ?>%;"
                    aria-valuenow="<?php echo $ozellik['puan']; ?>" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>

    <?php } ?>
</div>
