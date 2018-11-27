@if(isset($banner_160_600) and $banner_160_600 > 0)
	<div class="banner-160-600">
		@for($i=1;$i<$banner_160_600;$i++)
			
			<script type="text/javascript" src="https://www.adpeepshosted.com/adpeeps.php?bf=showad&amp;uid=102608&amp;bmode=off&amp;gpos=center&amp;bzone=whoamipage_{{ $i }}_right_square&amp;bsize=160x600&amp;btype=3&amp;bpos=default&amp;btotal=1026080&amp;btarget=_top&amp;brefresh=75&amp;bborder=1&amp;bexclusive=1"></script>
			<noscript>
			<a href="https://www.adpeepshosted.com/adpeeps.php?bf=go&amp;uid=102608&amp;bmode=off&amp;bzone=whoamipage_{{ $i }}_right_square&amp;bsize=160x600&amp;btype=1&amp;bpos=default" target="_top">
			<img src="https://www.adpeepshosted.com/adpeeps.php?bf=showad&amp;uid=102608&amp;bmode=off&amp;bzone=whoamipage_{{ $i }}_right_square&amp;bsize=160x600&amp;btype=1&amp;bpos=default&amp;bexclusive=1" width="160" height="600" alt="Click Here!" title="Click Here!" border="1" /></a>
			</noscript>
			<br /><br />
		@endfor
	</div>
@endif