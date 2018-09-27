Hi.auth();

// Access Tree

$url = Hi.home() + "/dashboardController.php"
+ "?" + Hi.loginprotocol();
$.get($url , function(data, status){ 

    Hi.modal();
    $('.modal-content>p').jsonView(data);

    var nodes = null;
    var edges = null;
    var network = null;
    
    var DIR = 'img/';
    var EDGE_LENGTH_MAIN = 300;
    var EDGE_LENGTH_SUB = 100;
    
    var nodes = [];
    var edges = [];
    
    var iid = 0;

    var getId = function(mylabel){
        for(var j = 0; j < nodes.length; j++) {
            if (nodes[j].label == mylabel){
                return nodes[j].id;
            }
        }
    }

    var nav = function (data, father)
    {
        if (data == null || data.length <= 0 )
            return;
        for(var i = 0; i < data.length; i++)
        {
            var item = data[i];
            var mylabel  = item.Key + '.' + item.Value;
            var icon = "";
            switch (item.Key)
            {
                case "Users.Id":
                    icon = "users.png";
                    break;
            }
            iid++;
            nodes.push({id: iid, label: mylabel, image: DIR + icon, shape: 'image'});
            edges.push({from: getId(father), to: iid, length: EDGE_LENGTH_SUB});
            nav(item.Leaves, mylabel);
        }
    }
    nodes.push({id: iid, label: 'Adam', image: 'Logo.svg', shape: 'image'});
    nav(data, 'Adam');    

    // if not father and duplicated

    // duplicated: count > 1
    // not father: from edges < 1

    for(var i = 0; i < nodes.length; i++)
    {
        var count_nodes = 0;
        for(var j = i; j < nodes.length; j++) 
        {
            if (nodes[j].label == nodes[i].label)
            {
                count_nodes++;
                if (count_nodes > 1)
                {
                    var count_edges = 0;
                    for(var k = 0; k < edges.length; k++) 
                    {
                        if (edges[k].from == getId(nodes[j].label))
                        {
                            count_edges++;
                        }
                    }
                    if (count_edges > 1)
                        nodes.remove(j,j);
                }                
            }
        }
    }

    var container = document.getElementById('access');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {};
    network = new vis.Network(container, data, options);
}, "json").fail(function() {
    Hi.message('خطا در دریافت اطلاعات', true);
});