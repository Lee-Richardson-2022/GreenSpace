<?php

function DelBtn(){ ?>
    <button class="delete-button">&times</button>
<?php } 

function Timeline(){ ?>

<div class="draggable wide" draggable="false" id="timeline">
    <?php DelBtn() ?>
    <p>Timeline</p>
</div> 

<?php } ?>

<?php

function Progress(){ ?>

<div class="draggable" draggable="false" id="progress">
    <?php DelBtn() ?>
    <p>Progress</p>
</div> 

<?php } ?>
