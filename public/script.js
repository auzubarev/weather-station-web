async function getDataFromAPI(data) {
    document.getElementById('spinner').style.display = '';
    let requestOptions = {
        method: 'POST',
        headers: {'Content-Type': 'application/json;charset=utf-8'},
        redirect: 'follow',
        body: JSON.stringify(data)
    };
    const response = await fetch('/api/v1/get', requestOptions)
    document.getElementById('spinner').style.display = 'none';
    return response.json()
}

function meteo() {
    return {
        reading: 'temperature',
        chart: null,
        init: function () {
            document.chart = new Chart(document.getElementById('chart'), {
                type: 'line',
                data: {
                    datasets: []
                },
                options: {
                    elements: {
                        point: {
                            radius: 2
                        }
                    },
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                displayFormats: {
                                    hour: "dd/HHч."
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'value'
                            }
                        }
                    }
                }
            });
            this.update();
        },
        update: function () {
            const labels = {
                humidity : 'Влажность',
                temperature : 'Температура',
                pressure : 'Давление'
            };
            getDataFromAPI({reading: this.reading}).then((v) => {
                document.chart.data.datasets = [{data : v, label : labels[this.reading]}];
                document.chart.update();
            });
        }
    }
}
