var exclude = ["HR"]

var margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = 500 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var x = d3.scale.ordinal()
    .rangeRoundBands([0, width], .1);

var y = d3.scale.linear()
    .range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(10);

var svg = d3.select("body").append("svg")
	.attr("id", "mainchart")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.tsv("data.tsv", type, function(error, data) {
  if (error) throw error;
  
  for(var key in data) {
	  var val = data[key].department;
	  
	  if(exclude.indexOf(val)!=-1){
		  delete data[key];
	  }
  }
  
  x.domain(data.map(function(d) { if(d==null){return} return d.department; }));
  y.domain([0, d3.max(data, function(d) { if(d==null){return} return d.revenue; })]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Revenue");

  svg.selectAll(".bar")
      .data(data)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("id", function(d) {if(d==null){return} return d.department; })
      .on("click", function(d) {
	  	removeBar(d.department);
		})
      .attr("x", function(d) {if(d==null){return} return x(d.department); })
      .attr("width", x.rangeBand())
      .attr("y", function(d) {if(d==null){return} return y(d.revenue); })
      .attr("height", function(d) {if(d==null){return} return height - y(d.revenue); });
});

function type(d) {
  d.revenue = +d.revenue;
  return d;
}

function removeBar(id){
	exclude.push(id);
	console.log(exclude);
}