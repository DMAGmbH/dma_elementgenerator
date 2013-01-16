<li class="<?php echo $this->class; ?>">
  <span class="label"><?php echo $this->label ?></span>
  <span class="value">
  <?php if ($this->addImage): ?>
<div class="image_container"<?php if ($this->margin): ?> style="<?php echo $this->margin; ?>"<?php endif; ?>>
<?php if ($this->href): ?>
<a href="<?php echo $this->href; ?>"<?php echo $this->attributes; ?> title="<?php echo $this->alt; ?>">
<?php endif; ?>
<img src="<?php echo $this->src; ?>"<?php echo $this->imgSize; ?> alt="<?php echo $this->alt; ?>">
<?php if ($this->href): ?>
</a>
<?php endif; ?>
<?php if ($this->caption): ?>
<div class="caption"><?php echo $this->caption; ?></div>
<?php endif; ?>
</div>
  <?php else: ?>
  <?php echo $this->value ?>
  <?php endif; ?>
  </span>
</li>
  
