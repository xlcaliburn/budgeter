function generateGraphs(food, transportation, entertainment, groceries, electronics, other) {
	var doughnutData = [
		{
			value: food,
			color:"#0066FF",
			highlight: "#66A3FF",
			label: "Food"
		},
		{
			value: transportation,
			color: "#FFFF00",
			highlight: "#FFFF4D",
			label: "Transportation"
		},
		{
			value: entertainment,
			color: "#FF99FF",
			highlight: "#FFC870",
			label: "Entertainment"
		},
		{
			value: groceries,
			color: "#33CC33",
			highlight: "#5CD65C",
			label: "Groceries"
		},
		{
			value: electronics,
			color: "#FF0066",
			highlight: "#ff66a3",
			label: "Electronics"
		},
		{
			value: other,
			color: "#CCCCCC",
			highlight: "#616774",
			label: "Other"
		}

	];

	var ctx = document.getElementById("chart-area").getContext("2d");
	window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
		responsive : true
	});
}