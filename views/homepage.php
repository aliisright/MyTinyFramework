<div class="col-md-11">
  <?= "Hello ".$_SESSION['nickname']; ?>

    <?php
      while($level = $levels->fetch()) {
    ?>
      <div class="level-box">
      <?php
        //Fetch skills where level = $level['level']
        $skills->execute(array($level['level']));
        while($skill = $skills->fetch()) {

        $userSkillSql = "SELECT * FROM user_skill WHERE user_id = ? AND skill_id = ?";
        $userSkill = dbConnection($userSkillSql);
        $userSkill->execute(array($_SESSION['id'], $skill['id']));
        $userSkill = $userSkill->fetch();
      ?>
          <a class= "lolo" href=<?= $userSkill['state_id'] == 2 ? "index.php?validatedSkillId=".$skill['id'] : "#" ?>><section data-toggle="<?= $userSkill['state_id'] == 3 ? 'modal' : '' ?>" data-target="#skill-description-<?= $skill['id'] ?>" class="skill-box <?= $userSkill['state_id'] == 1 ? 'skill-box-locked':($userSkill['state_id'] == 2 ? 'skill-box-unlocked':'') ?>">

            <!--Lock image-->
            <?php if($userSkill['state_id'] == 1) { ?>
              <img class="lock-image" src="https://cdn2.iconfinder.com/data/icons/app-types-in-grey/512/lock_512pxGREY.png" width="100px">
            <?php } ?>

            <!--Delete button-->
            <?php if($userSkill['state_id'] == 3) { ?>
              <div class="skill-delete-button">
                <a href="index.php?deletedSkillId=<?= $skill['id'] ?>"><span><img src="https://vignette.wikia.nocookie.net/theloudhouse/images/a/a5/X.png/revision/latest?cb=20170917150003" width="10px"></span></a>
              </div>
            <?php } ?>

            <!--score stars-->
            <?php
              if($userSkill['state_id'] == 3) {
            ?>
                <div class="score-stars badge badge-dark">
                  <?php
                    $starSql = "SELECT * FROM scores WHERE id = ?";
                    $stars = dbConnection($starSql);
                    $stars->execute(array($userSkill['score_id']));
                    $stars = $stars->fetch();
                    for($i=1; $i<=$stars['id']; $i++) {
                  ?>
                      <img src="http://www.pngpix.com/wp-content/uploads/2016/11/PNGPIX-COM-Star-Vector-PNG-Transparent-Image-500x481.png" width="20px" height="20px">
                  <?php } ?>
                </div>
            <?php } ?>

            <!--Image-->
            <img src="<?= $skill['path'] ?>" width="100px">

            <!--Modal-->
            <div class="modal fade skill-modal" id="skill-description-<?= $skill['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="skill-description-label" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="skill-description-label"><?= $skill['name'] ?></h5>
                      <!--Modal Stars-->
                        <div class="d-flex">
                          <?php
                            $starSql = "SELECT * FROM scores WHERE id = ?";
                            $stars = dbConnection($starSql);
                            $stars->execute(array($userSkill['score_id']));
                            $stars = $stars->fetch();
                            for($i=1; $i<=$stars['id']; $i++) {
                          ?>
                              <a href="index.php?deleteStarSkillId=<?= $userSkill['id'] ?>&i=<?= $i ?>"><img src="http://www.pngpix.com/wp-content/uploads/2016/11/PNGPIX-COM-Star-Vector-PNG-Transparent-Image-500x481.png" width="20px" height="20px"></a>
                          <?php }
                            for($i=$stars['id']+1; $i<=5; $i++) {
                          ?>
                              <a href="index.php?addStarSkillId=<?= $userSkill['id'] ?>&i=<?= $i ?>"><img src="https://www.muvizz.com/images/icon/empty-star.png" width="20px" height="20px"></a>
                          <?php } ?>

                        </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <ul class="list-group">
                    <?php
                      $goals = fetchCompletedGoals($skill['id']);
                      foreach($goals as $goal) {
                        $sql = "SELECT * FROM user_skillgoal WHERE skillgoal_id = ?";
                        $goalToDelete = dbConnection($sql);
                        $goalToDelete->execute(array($goal['id']));
                        $goalToDelete = $goalToDelete->fetch();
                      ?>
                          <li class="list-group-item list-group-item-success"><a href="index.php?userSkillGoaltoDelete=".<?= $goalToDelete['id'] ?>><img class="mr-2"   src="http://pluspng.com/img-png/success-png-success-icon-image-23194-400.png" width="20px"></a><?= $goal['goal'] ?></li>
                      <?php }
                      $goals = fetchUncompletedGoals($skill['id']);
                      foreach($goals as $goal) {
                      ?>
                      <a class="link" href="index.php?userSkillGoaltoAdd=".<?= $goal['id'] ?>><li class="list-group-item"><?= $goal['goal'] ?></li></a>
                    <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </section></a>
      <?php } ?>
        </div>
      <?php }?>
</div>
