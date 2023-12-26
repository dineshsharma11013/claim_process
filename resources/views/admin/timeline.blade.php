@extends("admin_layout.main")

@section("container")

<style>

.tl {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

.tl::after {
  content: "";
  position: absolute;
  width: 6px;
  background-color: #00c0ef;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

.tl-container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

.tl-container::after {
  content: "";
  position: absolute;
  width: 25px;
  height: 25px;
  right: -13px;
  background-color: #fff;
  border: 4px solid #00c0ef;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

.tl-left {
  left: 0;
}

.tl-right {
  left: 50%;
}

.tl-left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid #fff;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent #e6f0f6;
}

.tl-right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid #fff;
  border-width: 10px 10px 10px 0;
  border-color: transparent #e6f0f6 transparent transparent;
}

.tl-right::after {
  left: -13px;
}

.tl-content {
  padding: 20px 30px;
  background-color: #3c8dbc21;
  position: relative;
  border-radius: 6px;
}

@media screen and (max-width: 600px) {
  .tl::after {
    left: 31px;
  }

  .tl-container {
    width: 100%;
    padding-left: 70px;
    padding-right: 25px;
  }

  .tl-container::before {
    left: 60px;
    border: medium solid #fff;
    border-width: 10px 10px 10px 0;
    border-color: transparent #fff transparent transparent;
  }

  .tl-left::after,
  .tl-right::after {
    left: 15px;
  }

  .tl-right {
    left: 0%;
  }
}

</style>

<div class="content-wrapper" style="min-height: 985.604px;">

<section class="content-header">
<h1>
Timeline
<!--<small>Blank example to the boxed layout</small>-->
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Timeline</li>
</ol>
</section>

<section class="content">

<div class="box">
<!--<div class="box-header with-border">-->
<!--<h3 class="box-title">Title</h3>-->
<!--<div class="box-tools pull-right">-->
<!--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">-->
<!--<i class="fa fa-minus"></i></button>-->

<!--</div>-->
<!--</div>-->
<div class="box-body">


<!-- timeline start-->

<div class="tl">
  <div class="tl-container tl-left">
    <div class="tl-content">
      <h4> <b> Tasks of the Day </b></h4>
      <p>
        Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec
        admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis
        iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto
        primis ea eam.
      </p>
    </div>
  </div>
  <div class="tl-container tl-right">
    <div class="tl-content">
      <h4> <b>  Weekly To-Do List </b></h4>
      <p>
        Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec
        admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis
        iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto
        primis ea eam.
      </p>
    </div>
  </div>
  <div class="tl-container tl-left">
    <div class="tl-content">
      <h2>Employee Wise</h2>
      <p>
        Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec
        admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis
        iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto
        primis ea eam.
      </p>
    </div>
  </div>
  <div class="tl-container tl-right">
    <div class="tl-content">
      <h2>Date Wise </h2>
      <p>
        Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec
        admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis
        iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto
        primis ea eam.
      </p>
    </div>
  </div>
  <div class="tl-container tl-left">
    <div class="tl-content">
      <h2>Company Wise </h2>
      <p>
        Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec
        admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis
        iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto
        primis ea eam.
      </p>
    </div>
  </div>
  <!--<div class="tl-container tl-right">
    <div class="tl-content">
      <h2>2007</h2>
      <p>
        Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec
        admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis
        iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto
        primis ea eam.
      </p>
    </div>
  </div>-->
</div>

<!-- timeline end-->



</div>



</div>

</section>

</div>

@endsection  