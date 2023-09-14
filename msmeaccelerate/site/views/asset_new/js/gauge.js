const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Extreme', 'Medium'],
            datasets: [{
                label: ['This Graph will show Overall Risk is Extreme or Low'],
            data: [10, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)', // red
               
                'rgba(255, 206, 86, 1)' // yellow
               
                
            ],
            // borderColor: [
            //     'rgba(255, 99, 132, 1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)'
               
            // ],
           
        }]
    },

    

    options: {
   indexAxis: 'y',

    },
    
});