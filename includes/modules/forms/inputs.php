<?php

/**
 * [generateInput description]
 * @param  string $type        [description]
 * @param  [type] $name        [description]
 * @param  [type] $description [description]
 * @param  [type] $iconName    [description]
 * @param  [type] $value       [description]
 * @return [type]              [description]
 *
 * example:
 *  <div class="input-div one">
 *   <label>
 *     <div class="i">
 *       <i class="material-icons" aria-hidden="true">face</i>
 *     </div>
 *     <div class="div">
 *       <span class="input-description">Database name</span>
 *       <input id="db_name" type="text" class="input">
 *     </div>
 *   </label>
 *  </div>
 */

function generateInput($type = "text", $name, $description = null, $iconName = null, $value = null, $additional = null) {
  ?>
  <div class="input-div one <?= ($value != null) ? 'focus' : '' ?>">
      <label <?= ($iconName == null) ? 'class="no-icon"' : '' ?>>
        <?php
        if ($iconName != null) {

          ?>
          <div class="i">
            <i class="material-icons" aria-hidden="true"><?= $iconName ?></i>
          </div>
          <?php
        }

        ?>
        <div class="div">
          <?php
          if ($description != null) {

            ?>
              <span class="input-description"><?= $description ?></span>
            <?php
          }

          $value = ($value != null) ? $value : "";

          ?>
          <input id="<?= $name ?>" name="<?= $name ?>" type="<?= $type ?>" value="<?= $value ?>" class="input" onfocus="let parent = this.parentNode.parentNode.parentNode; parent.classList.add('focus');" onblur="let parent = this.parentNode.parentNode.parentNode; if(this.value == ''){parent.classList.remove('focus');}" <?= (!empty($additional) AND count($additional) > 1) ? implode(" ", $additional) : (($additional != null AND count($additional) == 1) ? $additional[0] : '') ?>>
        </div>
      </label>
    </div>
    <?php
}


?>
