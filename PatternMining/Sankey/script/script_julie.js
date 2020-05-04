// https://observablehq.com/@d3/sankey-diagram@273
export default function define(runtime, observer) {
    const main = runtime.module();
    const fileAttachments = new Map([
        ["data.csv", new URL("../files/data_julie",
            import.meta.url)]
    ]);
    main.builtin("FileAttachment", runtime.fileAttachments(name => fileAttachments.get(name)));

    main.define("viewof align", ["html", "URLSearchParams"], function(html, URLSearchParams) {
        return (
            Object.assign(html `<select>
            <option value=left>Left-aligned
            <option value=right>Right-aligned
            <option value=center>Centered
            <option value=justify selected>Justified
            </select>`, {
                value: new URLSearchParams(html `<a href>`.search).get("align") || "justify"
            })
        )
    });
    main.define("align", ["Generators", "viewof align"], (G, _) => G.input(_));

    main.variable(observer("viewof edgeColor")).define("viewof edgeColor", ["html", "URLSearchParams"], function(html, URLSearchParams) {
        return (
            Object.assign(html `<select>
            <option value=input>Couleur de l\'entrée
            <option value=output>Couleur de la sortie
            <option value=path selected>Couleur entrée/sortie
            <option value=none>Sans couleur
            </select>`, {
                value: new URLSearchParams(html `<a href>`.search).get("color") || "path"
            })
        )
    });
    main.define("edgeColor", ["Generators", "viewof edgeColor"], (G, _) => G.input(_));

    main.variable(observer("chart")).define("chart", ["d3", "width", "height", "sankey", "data", "color", "format", "edgeColor", "DOM"], function(d3, width, height, sankey, data, color, format, edgeColor, DOM) {
        const svg = d3.create("svg")
            .attr("viewBox", [0, 0, width, height]);

        const { nodes, links } = sankey(data);

        svg.append("g")
            .attr("stroke", "#000")
            .selectAll("rect")
            .data(nodes)
            .join("rect")
            .attr("x", d => d.x0)
            .attr("y", d => d.y0)
            .attr("height", d => d.y1 - d.y0)
            .attr("width", d => d.x1 - d.x0)
            .attr("fill", color)
            .append("title")
            .text(d => `${d.name}\n${format(d.value)}`);

        const link = svg.append("g")
            .attr("fill", "none")
            .attr("stroke-opacity", 0.5)
            .selectAll("g")
            .data(links)
            .join("g")
            .style("mix-blend-mode", "multiply");

        if (edgeColor === "path") {
            const gradient = link.append("linearGradient")
                .attr("id", d => (d.uid = DOM.uid("link")).id)
                .attr("gradientUnits", "userSpaceOnUse")
                .attr("x1", d => d.source.x1)
                .attr("x2", d => d.target.x0);

            gradient.append("stop")
                .attr("offset", "0%")
                .attr("stop-color", d => color(d.source));

            gradient.append("stop")
                .attr("offset", "100%")
                .attr("stop-color", d => color(d.target));
        }

        link.append("path")
            .attr("d", d3.sankeyLinkHorizontal())
            .attr("stroke", d => edgeColor === "none" ? "#aaa" :
                edgeColor === "path" ? d.uid :
                edgeColor === "input" ? color(d.source) :
                color(d.target))
            .attr("stroke-width", d => Math.max(1, d.width));

        link.append("title")
            .text(d => `${d.source.name} → ${d.target.name}\n${format(d.value)}`);

        svg.append("g")
            .attr("font-family", "sans-serif")
            .attr("font-size", 10)
            .selectAll("text")
            .data(nodes)
            .join("text")
            .attr("x", d => d.x0 < width / 2 ? d.x1 + 6 : d.x0 - 6)
            .attr("y", d => (d.y1 + d.y0) / 2)
            .attr("dy", "0.35em")
            .attr("text-anchor", d => d.x0 < width / 2 ? "start" : "end")
            .text(d => d.name);

        return svg.node();
    });
    main.define("sankey", ["d3", "align", "width", "height"], function(d3, align, width, height) {
        const sankey = d3.sankey()
            .nodeId(d => d.name)
            .nodeAlign(d3[`sankey${align[0].toUpperCase()}${align.slice(1)}`])
            .nodeWidth(15)
            .nodePadding(10)
            .extent([
                [1, 5],
                [width - 1, height - 5]
            ]);
        return ({ nodes, links }) => sankey({
            nodes: nodes.map(d => Object.assign({}, d)),
            links: links.map(d => Object.assign({}, d))
        });
    });
    main.define("format", ["d3", "data"], function(d3, data) {
        const format = d3.format(",.0f");
        return data.units ? d => `${format(d)} ${data.units}` : format;
    });
    main.define("color", ["d3"], function(d3) {
        const color = d3.scaleOrdinal(d3.schemeCategory10);
        return d => color(d.category === undefined ? d.name : d.category);
    });
    main.define("data", ["d3", "FileAttachment"], async function(d3, FileAttachment) {
        const links = d3.csvParse(await FileAttachment("data.csv").text(), d3.autoType);
        const nodes = Array.from(new Set(links.flatMap(l => [l.source, l.target])), name => ({ name, category: name.replace(/ .*/, "") }));
        return { nodes, links, units: "phonèmes" };
    });
    main.define("width", function() {
        return (
            954
        )
    });
    main.define("height", function() {
        return (
            1000
        )
    });
    main.define("d3", ["require"], function(require) {
        return (
            require("d3@5", "d3-sankey@0.12")
        )
    });
    return main;
}