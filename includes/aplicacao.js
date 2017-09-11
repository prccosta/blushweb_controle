$(function () {
	function removeCampo() {
		$(".removerCampo").unbind("click");
		$(".removerCampo").bind("click", function () {
			i=0;
			$(".campos p.campoMatricula").each(function () {
				i++;
			});
			if (i>1) {
				$(this).parent().remove();
			}
		});
	}
	removeCampo();
	$(".adicionarCampo").click(function () {
		novoCampo = $(".campos p.campoMatricula:first").clone();
		novoCampo.find("input").val("");
		novoCampo.insertAfter(".campos p.campoMatricula:last");
		removeCampo();
	});
});