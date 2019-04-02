<?php defined('IN_IA') or exit('Access Denied');?>

<style type="text/css">
	.option-picker{
		padding-bottom:2.25rem
	}
	.picker-bulk .header {
		height: 4.5rem;
		padding: 0 0.6rem 0.3rem 0.6rem;
	}
	.picker-bulk .header .thumb {
		height: 5rem;
		width: 5rem;
		background: #eee;
		border-radius: 0.2rem;
		position: absolute;
		top: -0.8rem;
		left: 0.7rem;
	}
	.picker-bulk .header .thumb img {
		height: 5rem;
		width: 5rem;
		border-radius: 0.2rem;
	}
	.picker-bulk .header .inner {
		height: inherit;
		padding: 0.8rem 1.7rem 0 5.5rem;
	}
	.picker-bulk .header .inner .title {
		height: 1.8rem;
		font-size: 0.75rem;
		line-height: 0.9rem;
		text-overflow: -o-ellipsis-lastline;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
	}
	.picker-bulk .header .inner .price {
		height: 1.5rem;
		line-height: 2rem;
		font-size: 0.9rem;
		color: #ff5555;
	}
	.picker-bulk .header .inner .price small {
		font-size: 0.5rem;
	}
	.picker-bulk .header .icon-guanbi1 {
		color: #5d5d5d;
		font-size: 1.4rem;
		position: absolute;
		top: 0.1rem;
		right: 0.5rem;
	}
	.picker-bulk .header .icon-guanbi1:before {
		font-weight: 100;
	}
	.picker-bulk .specs {
		height: 2.35rem;
		padding: 0 0.3rem;
		font-size: 0.75rem;
		color: #333;
		border-top: 1px solid #f5f5f5;
		border-bottom: 1px solid #f2f2f2;
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
	}
	.picker-bulk .specs .go-left,
	.picker-bulk .specs .go-right {
		height: 2.35rem;
		line-height: 2.35rem;
		color: #9e9e9e;
	}
	.picker-bulk .specs .inner {
		padding: 0.6rem 0;
		-webkit-box-flex: 1;
		-webkit-flex: 1;
		-ms-flex: 1;
		flex: 1;
	}
	.picker-bulk .specs .inner .item {
		width: 33.33%;
		text-align: center;
		float: left;
		position: relative;
	}
	.picker-bulk .specs .inner .item:before {
		content: "";
		border-left: 2px solid #f3f3f3;
		position: absolute;
		top: 0;
		left: 0;
		bottom: 0;
	}
	.picker-bulk .specs .inner .item:first-child:before {
		border: 0;
	}
	.picker-bulk .specs .inner .item.active:after {
		content: "";
		position: absolute;
		border-bottom: 2px solid #ff5555;
		width: 2rem;
		left: 50%;
		margin-left: -1rem;
		bottom: -0.55rem;
	}
	.picker-bulk .specs .inner .item .dot {
		position: absolute;
		right: 0.25rem;
		top: -0.25rem;
		font-size: 0.5rem;
		color: #fff;
		background: #ff4444;
		height: 0.8rem;
		line-height: 0.8rem;
		border-radius: 0.8rem;
		padding: 0 0.15rem;
	}
	.picker-bulk .body {
		max-height: 11.45rem;
		overflow-y: auto;
		-webkit-overflow-scrolling: touch;
	}
	.picker-bulk .body .item {
		height: 3.3rem;
		padding: 0 0.6rem;
		position: relative;
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
	}
	.picker-bulk .body .item:before {
		content: "";
		position: absolute;
		border-top: 1px solid #e3e3e3;
		top: 0;
		left: 0.6rem;
		right: 0.6rem;
		-webkit-transform-origin: 0 0;
		-ms-transform-origin: 0 0;
		transform-origin: 0 0;
		-webkit-transform: scaleY(0.5);
		-ms-transform: scaleY(0.5);
		transform: scaleY(0.5);
	}
	.picker-bulk .body .item:first-child:before {
		border: 0;
	}
	.picker-bulk .body .item .left {
		width: 1%;
		-webkit-box-flex: 1;
		-webkit-flex: 1;
		-ms-flex: 1;
		flex: 1;
		line-height: 1rem;
		font-size: 0.75rem;
	}
	.picker-bulk .body .item .left .title {
		height: 1rem;
		padding-right: 0.2rem;
		display: block;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
	.picker-bulk .body .item .left .price {
		color: #999;
		font-size: 0.65rem;
		line-height: 0.65rem;
		padding-bottom: 0.2rem;
	}
	.picker-bulk .body .item .right {
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
	}
	.picker-bulk .body .item .right .total {
		color: #666;
		font-size: 0.55rem;
		padding-right: 0.4rem;
	}
	.picker-bulk .counts {
		height: 2.2rem;
		padding: 0.2rem 0.6rem;
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
		position: relative;
	}
	.picker-bulk .counts:before {
		content: "";
		border-top: 1px solid #e6e6e6;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		-webkit-transform-origin: 0 0;
		-ms-transform-origin: 0 0;
		transform-origin: 0 0;
		-webkit-transform: scaleY(0.5);
		-ms-transform: scaleY(0.5);
		transform: scaleY(0.5);
	}
	.picker-bulk .counts .tip {
		padding: 0.1rem 0.35rem;
		border: 1px solid #ff5555;
		color: #ff5555;
		font-size: 0.55rem;
		border-radius: 1rem;
	}
	.picker-bulk .counts .tip.size1 {
		font-size: 0.5rem;
	}
	.picker-bulk .counts .tip.size2 {
		font-size: 0.45rem;
	}
	.picker-bulk .counts .inner {
		text-align: right;
		font-size: 0.65rem;
		line-height: 0.9rem;
		color: #737373;
		-webkit-box-flex: 1;
		-webkit-flex: 1;
		-ms-flex: 1;
		flex: 1;
		vertical-align: bottom;
	}
	.picker-bulk .counts .inner .countprice {
		color: #ff5555;
		font-size: 0.8rem;
		vertical-align: bottom;
	}
	.picker-bulk .counts .inner .countprice span {
		font-size: 0.5rem;
	}
	.option-picker .fui-navbar .btn {
		font-size: 0.85rem;
	}
	.fui-number {
		height: 1.6rem;
		width: 5.95rem;
	}
	.fui-number .minus,
	.fui-number .plus {
		width: 1.6rem;
		font-weight: 300;
		font-size: 1.2rem;
		line-height: 1.3rem;
	}
</style>

<script type="text/html" id="option-wholesalepicker">
	<div class="option-picker">
		<div class="option-picker-inner picker-bulk">
			<div class="header">
				<div class="thumb">
					<img src="<%goods.thumb%>" />
				</div>
				<div class="inner">
					<div class="title"><%goods.title%></div>
					<div class="price"><%if goods.minprice>0%><small>￥</small><%goods.minprice%>-<%/if%><small>￥</small><%goods.maxprice%></div>
				</div>
				<i class="icon icon-guanbi1"></i>
			</div>
			<%if hasoption==2%>
				<div class="specs ">
					<div class="go-left" style="width: 13px;display: block;"></div>
					<div class="inner swiper-container">
						<div class="swiper-wrapper">
							<%each spec1items as item%>
								<div class="swiper-slide item  btnitem1"  id="item1_<%item.id%>"  data-id="<%item.id%>" ><%item.title%><span class="dot" style="display: none;"></span></div>
							<%/each%>
						</div>
					</div>
					<div class="go-right"><i class="icon icon-right"></i></div>
				</div>

				<%each spec1items as item%>
				<div class="body" id="body_<%item.id%>" data-id="<%item.id%>"  style="display: none;">

					<%each spec2items as item2%>
					<div class="item optiondata" data-optionid="<%if  item.id < item2.id%><%options[item.id+'_'+item2.id].id%><%else%><%options[item2.id+'_'+item.id].id%><%/if%>"  data-total="0">

						<div class="left">
							<p class="title"><%item2.title%></p>
							<p class="price"></p>
						</div>
						<div class="right">
							<div class="total">库存:<span class="stock">	<%if  item.id < item2.id%><%options[item.id+"_"+item2.id].stock%><%else%><%options[item2.id+"_"+item.id].stock%><%/if%></span></div>
							<div class="fui-number">
								<div class="minus disabled">-</div>
								<input class="num" type="tel" name="" value="0">
								<div class="plus">+</div>
							</div>
						</div>
					</div>
					<%/each%>
				</div>
				<%/each%>
			<%/if%>

			<%if hasoption==1%>
				<div class="body">
					<%each spec1items as item%>
					<div class="item optiondata" data-optionid="<%options[item.id].id%>"  data-total="0">
						<div class="left">
							<p class="title"><%item.title%></p>
							<p class="price"></p>
						</div>
						<div class="right">
							<div class="total">库存:<span class="stock"><%options[item.id].stock%></span></div>
							<div class="fui-number">
								<div class="minus disabled">-</div>
								<input class="num" type="tel" name="" value="0">
								<div class="plus">+</div>
							</div>
						</div>
					</div>
					<%/each%>
				</div>
			<%/if%>

			<%if hasoption==0%>
				<div class="body">
					<div class="item optiondata" data-optionid="0"  data-total="0">
						<div class="left">
							<p class="title"><%goods.title%></p>
							<p class="price"></p>
						</div>
						<div class="right">
							<div class="total">库存:<span class="stock"><%goods.total%></span></div>
							<div class="fui-number">
								<div class="minus disabled">-</div>
								<input class="num" type="tel" name="" value="0">
								<div class="plus">+</div>
							</div>
						</div>
					</div>
				</div>
			<%/if%>

			<div class="counts">
				<div class="tip size2" id="again"></div>
				<div class="inner">
					<p  id="UnitPrice"></p>
					<p class="countprice">总价: ￥<span id='totalprice'></span></p>
				</div>
			</div>
			<%=diyformhtml%>
		</div>
		<div class="fui-navbar">
			<a href="javascript:;" class="nav-item btn cartbtn" style='display:none'>加入购物车</a>
			<a href="javascript:;" class="nav-item btn buybtn"  style='display:none' >立刻购买</a>
			<a href="javascript:;" class="nav-item btn confirmbtn"  style='display:none'>确定</a>
		</div>
	</div>
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_account', TEMPLATE_INCLUDEPATH)) : (include template('_account', TEMPLATE_INCLUDEPATH));?>