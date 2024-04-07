<?php
include 'db_connect.php';
$six_months_ago = date('Y-m-d', strtotime('-6 months'));
$sales_data = $conn->query("SELECT DATE_FORMAT(date_created, '%Y-%m') AS month, SUM(after_discount) AS total_sales FROM orders WHERE amount_tendered > 0 AND date_created >= '$six_months_ago' GROUP BY month ORDER BY month ASC");
?>

<style>
    span.float-right.summary_icon {
        font-size: 3rem;
        position: absolute;
        right: 1rem;
        top: 0;
    }

    .imgs {
        margin: .5em;
        max-width: calc(100%);
        max-height: calc(100%);
    }

    .imgs img {
        max-width: calc(100%);
        max-height: calc(100%);
        cursor: pointer;
    }

    #imagesCarousel,
    #imagesCarousel .carousel-inner,
    #imagesCarousel .carousel-item {
        height: 60vh !important;
        background: black;
    }

    #imagesCarousel .carousel-item.active {
        display: flex !important;
    }

    #imagesCarousel .carousel-item-next {
        display: flex !important;
    }

    #imagesCarousel .carousel-item img {
        margin: auto;
    }

    #imagesCarousel img {
        width: auto !important;
        height: auto !important;
        max-height: calc(100%) !important;
        max-width: calc(100%) !important;
    }

    .container {
        height: 250px;
        width: 580px;
        background: #1F1D2B;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        padding: 10px;
        overflow-y: auto;
    }

    #input {
        height: 50px;
        width: 100%;
        outline: none;
        border: none;
        border-radius: 5px;
        background: #666;
        color: #fff;
        padding: 0 10px;
        margin: 10px 0;
    }

    #input::placeholder {
        color: #bbb;
    }

    ul li {
        background: #5E666F;
        color: whitesmoke;
        height: 40px;
        border-radius: 50px;
        margin: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10px;
        position: relative;
        transition: 0.2s;
    }

    .icons {
        display: flex;
        gap: 10px;
    }

    .icons i {
        cursor: pointer;
    }

    .icons .checkbox {
        color: whitesmoke;
        font-size: 20px;
    }

    .icons .fa-trash {
        color: red;
    }

    ul .checked {
        text-decoration: line-through;
        color: #FED108;
    }

    #shareContainer {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        margin-top: 20px;
    }

    #shareBtn {
        /* background: #FED108;
        color: black;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        margin-top: 10px; */
        background-color: #FED108;
        color: black;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #whatsappBtn {
        background-color: #25D366;
        color: black;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #whatsappInputContainer {
        display: none;
    }

    #whatsappInputContainer input[type="text"] {
        border: 1px solid #E4E4E4;
        border-radius: 5px;
        padding: 10px;
        width: 200px;
        margin-right: 10px;
    }

    #whatsappInputContainer button {
        background-color: #25D366;
        color: black;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #whatsappInputContainer button:hover {
        color: white;
        background-color: #128C7E;
    }
</style>

<div class="containe-fluid">
    <div class="row mb-2 mt-3">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row ml-3 mr-3">
        <div class="col-lg-12" style="margin-left:-100px">
            <div class="card">
                <div class="card-body text-white text-center h2 p-0 pt-2" style="background-color: #1F1D2B;">
                    <?php echo "Welcome back " . $_SESSION['login_name'] . "!"  ?>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="row ml-3 mr-3">
        <div class="col-lg-6" style="margin-left:-100px ">
        <div class="container">
    <div class="input-container" style="position: relative;">
        <input type="text" id="input" placeholder="Enter to add" style="padding-right: 40px;">
        <button id="addItemBtn" style="position: absolute; right: 5px; top: 0; bottom: 0; margin: auto;height:30px"><i class="fas fa-plus"></i></button>
    </div>
    <ul></ul>
</div>


            <div id="shareContainer">
                <button id="shareBtn">Download</button>
                <button id="whatsappBtn">Share via WhatsApp</button>
                <div id="whatsappInputContainer" style="display: none;">
                    <input type="text" id="whatsappNumber" placeholder="Enter WhatsApp number">
                    <button id="sendToWhatsAppBtn">Send</button>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="card-header text-white text-center h4" style="background-color: #343a40;">
                Monthly Sales
            </div>
            <div class="card" style="background-color: #1F1D2B;">
                <canvas id="salesChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="row ml-3 mr-3">
        <div class="col-lg-6" style="margin-left:-100px">
            <div class="card" style="background-color: #1F1D2B;">
                asdasdasd
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card" style="background-color: #1F1D2B;">
                <div class="card-header text-white text-center h4" style="background-color: #343a40; border-radius: 5px;">
                    Yearly Sales
                </div>
                <div class="card" style="background-color: #1F1D2B;">
                    <canvas id="yearlySalesChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        // Load todo list from local storage on page load
        var todoList = JSON.parse(localStorage.getItem('todoList')) || [];

        // Function to populate todo list items
        function populateTodoList() {
            $('ul').empty(); // Clear existing list
            todoList.forEach(function(item) {
                $('ul').append(item);
            });
        }

        // Call function to populate todo list
        populateTodoList();

        $('#input').on('keyup', function(event) {
            if (event.key === "Enter") {
                addItem();
            }
        });

        $('#addItemBtn').on('click', function() {
            addItem();
        });

        function addItem() {
            var input = $('#input').val();

            if (input.trim() !== '') {
                // Use a checkbox instead of a checkmark icon
                var listItem = '<li><div class="icons"><i class="fas checkbox fa-square"></i></div>' + input + '<div class="icons"></i><i class="fas fa-trash"></i></div></li>';
                $('ul').append(listItem);
                $('#input').val('');
                todoList.push(listItem); // Add new item to the todoList array
                saveTodoList(); // Save todo list to local storage
            }
        }

        $('ul').on('click', '.fa-trash', function() {
            $(this).closest('li').fadeOut(200, function() {
                $(this).remove();
                updateTodoList(); // Update todo list array after removing item
            });
        });

        $('ul').on('click', '.checkbox', function() {
            $(this).toggleClass('fa-check-square fa-square');
            $(this).closest('li').toggleClass('checked');
            updateTodoList(); // Update todo list array after toggling checkbox
        });

        $('#shareBtn').on('click', function() {
            shareToWhatsApp();
        });

        function shareToWhatsApp() {
            // Get today's date for the file name
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            var currentDate = dd + '-' + mm + '-' + yyyy;

            // Create a string representing the to-do list
            var pendingList = '';
            var doneList = '';
            $('ul li').each(function() {
                var task = $(this).text().trim();
                if ($(this).hasClass('checked')) {
                    doneList += task + '\n';
                } else {
                    pendingList += task + '\n';
                }
            });

            var todoListText = 'Pending:\n' + pendingList + '\nDone:\n' + doneList;

            // Create a Blob from the to-do list text
            var blob = new Blob([todoListText], {
                type: 'text/plain'
            });

            // Create a temporary link with a blob URL
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = currentDate + ' To Do List.txt';

            // Simulate a click to trigger the download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        $('#whatsappBtn').on('click', function() {
            $('#whatsappInputContainer').toggle();
        });

        $('#sendToWhatsAppBtn').on('click', function() {
            var phoneNumber = $('#whatsappNumber').val();
            var todoListText = getTodoListText();
            sendTodoListToWhatsApp(phoneNumber, todoListText);
        });

        function getTodoListText() {
            var todoListText = '';
            $('ul li').each(function() {
                var task = $(this).text().trim();
                todoListText += task + '\n';
            });
            return todoListText;
        }

        function sendTodoListToWhatsApp(phoneNumber, todoListText) {
            // Open WhatsApp with prefilled message
            var whatsappLink = 'https://api.whatsapp.com/send?phone=' + encodeURIComponent(phoneNumber) + '&text=' + encodeURIComponent(todoListText);
            window.open(whatsappLink, '_blank');
        }

        // Function to save todo list to local storage
        function saveTodoList() {
            localStorage.setItem('todoList', JSON.stringify(todoList));
        }

        // Function to update todo list array in local storage
        function updateTodoList() {
            todoList = [];
            $('ul li').each(function() {
                var listItem = $(this).prop('outerHTML');
                todoList.push(listItem);
            });
            saveTodoList(); // Save updated todo list to local storage
        }
    });
</script>





<!-- <script src="https://cdn.jsdelivr.net/npm/date-fns@2"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@3"></script> -->
<!-- <script src="assets\vendor\chart.js\cahrt.js"></script>
<script src="assets\vendor\chart.js\chartjs-adapter-date-fns@3.js"></script> -->
<!-- ------------------------------ -->
<script src="assets\chart.js\dist\chart.min.js"></script>
<script src="assets\chartjs-adapter-date-fns\dist\chartjs-adapter-date-fns.bundle.min.js"></script>
<script>
    <?php
    $months = [];
    $totalSales = [];

    while ($row = $sales_data->fetch_array()) {
        $months[] = $row['month'];
        $totalSales[] = $row['total_sales'];
    }
    ?>

    console.log("Months: ", <?php echo json_encode($months); ?>);
    console.log("Total Sales: ", <?php echo json_encode($totalSales); ?>);

    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Total Sales',
                data: <?php echo json_encode($totalSales); ?>,
                backgroundColor: 'rgb(255, 205, 86)',
                borderColor: 'rgb(255, 255, 255, 1)',
                borderWidth: 1.5
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'month'
                    }
                },
                y: {
                    beginAtZero: true
                }
            },
            legend: {
                display: true,
                position: 'left',
                align: 'start',
                labels: {
                    boxWidth: 10,
                    padding: 10,
                }
            }
        }
    });

    <?php
    $yearly_sales_data = $conn->query("SELECT YEAR(date_created) AS year, SUM(after_discount) AS total_sales FROM orders WHERE amount_tendered > 0 GROUP BY year ORDER BY year ASC");

    $yearlyMonths = [];
    $yearlyTotalSales = [];

    while ($row = $yearly_sales_data->fetch_array()) {
        $yearlyMonths[] = $row['year'];
        $yearlyTotalSales[] = $row['total_sales'];
    }
    ?>

    console.log("Yearly Sales: ", <?php echo json_encode($yearlyTotalSales); ?>);

    var yearlyCtx = document.getElementById('yearlySalesChart').getContext('2d');
    var yearlySalesChart = new Chart(yearlyCtx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($yearlyMonths); ?>,
            datasets: [{
                label: 'Yearly Sales',
                data: <?php echo json_encode($yearlyTotalSales); ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(54, 162, 235)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            aspectRatio: 1,
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50,
        }
    });
</script>
<script>
    $('#manage-records').submit(function(e) {
        e.preventDefault()
        start_load()
        $.ajax({
            url: 'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                resp = JSON.parse(resp)
                if (resp.status == 1) {
                    alert_toast("Data successfully saved", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 800)

                }

            }
        })
    })
    $('#tracking_id').on('keypress', function(e) {
        if (e.which == 13) {
            get_person()
        }
    })
    $('#check').on('click', function(e) {
        get_person()
    })

    function get_person() {
        start_load()
        $.ajax({
            url: 'ajax.php?action=get_pdetails',
            method: "POST",
            data: {
                tracking_id: $('#tracking_id').val()
            },
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    if (resp.status == 1) {
                        $('#name').html(resp.name)
                        $('#address').html(resp.address)
                        $('[name="person_id"]').val(resp.id)
                        $('#details').show()
                        end_load()

                    } else if (resp.status == 2) {
                        alert_toast("Unknow tracking id.", 'danger');
                        end_load();
                    }
                }
            }
        })
    }
</script>