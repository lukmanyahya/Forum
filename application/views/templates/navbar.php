<nav>
    <div class="container">
        <ul class="row pb-4 px-3">
            <li class="col-auto <?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'users') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>">Info Alumni</a></li>
            <li class="col-auto <?php echo ($this->uri->segment(1) == 'event') ? 'active' : ''; ?>"><a href="<?php echo base_url('event'); ?>">Event Alumni</a></li>
            <li class="col-auto <?php echo ($this->uri->segment(1) == 'job') ? 'active' : ''; ?>"><a href="<?php echo base_url('job'); ?>">Job Fair</a></li>
        </ul>
        <div class="pb-3 px-3">
            <hr class="m-0" data-aos="zoom-in">
        </div>
    </div>
</nav>