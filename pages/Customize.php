<?php
include_once "../component/user_nav.php";
?>
<head>
<link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
    <style>
        h3{
            background-color: #E33F5C;
            color: white;
        }
        .custom-shadow {
            box-shadow: 10px 10px 10px rgba(120, 118, 118, 0.5) !important; /* Red shadow */
        }
        .active-card {
            border: 2px solid #E33F5C !important; /* Highlight border */
            box-shadow: 0px 0px 15px rgba(227, 63, 92, 0.8) !important; /* Glowing effect */
            transform: scale(1.05); /* Slightly enlarge */
            transition: all 0.3s ease-in-out;
        }
        .btn:hover{
            background-color: #3655dc;
        }
    </style>
</head>
<body>
    <div class="container" id="baseContainer">
        <h3 class="border  custom-shadow rounded p-3 ps-3 mt-4 mb-4">Theme/Design</h3>
        <div class="row gy-4">
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/wedding_theme.jpg" class="card-img-top" alt="wedding_theme">
                    <div class="card-body">
                      <h5 class="card-title">Wedding</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/Aniversary_theme.jpg" class="card-img-top" alt="Aniversary_theme">
                    <div class="card-body">
                      <h5 class="card-title">Anniversary</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Corporate_theme.jpg" class="card-img-top" alt="Corporate_theme">
                    <div class="card-body">
                        <h5 class="card-title">Corporate</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Birthday_theme.jpg" class="card-img-top" alt="Birthday_theme">
                    <div class="card-body">
                      <h5 class="card-title">Birthday</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flavour -->
        <h3 class="border custom-shadow rounded p-3 ps-3 mt-4 mb-4">Flavour</h3>
        <div class="row gy-4">
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/Chocolate_flavour.jpg" class="card-img-top" alt="Chocolate_flavour">
                    <div class="card-body">
                      <h5 class="card-title">Chocolate</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/vanial_flavour.jpg" class="card-img-top" alt="Vanial_flavour">
                    <div class="card-body">
                      <h5 class="card-title">Vanilla</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Blackforest_flavour.jpg" class="card-img-top" alt="Blackforest_flavour">
                    <div class="card-body">
                        <h5 class="card-title">Black Forest</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Butterscotch_flavour.jpeg" class="card-img-top" alt="Butterscotch_flavour">
                    <div class="card-body">
                      <h5 class="card-title">Butterscotch</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- shape -->
        <h3 class="border custom-shadow rounded p-3 ps-3 mt-4 mb-4">Shape</h3>
        <div class="row gy-4">
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/Round_shape.jpg" class="card-img-top" alt="Round_shape">
                    <div class="card-body">
                      <h5 class="card-title">Round</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/Square_shape.jpg" class="card-img-top" alt="Square_shape">
                    <div class="card-body">
                      <h5 class="card-title">Square</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Heart_shape.jpg" class="card-img-top" alt="Heart_shape">
                    <div class="card-body">
                      <h5 class="card-title">Heart</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Rectangle_shape.jpg" class="card-img-top" alt="Rectangle_shape">
                    <div class="card-body">
                      <h5 class="card-title">Rectangle</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- size -->
        <h3 class="border custom-shadow rounded p-3 ps-3 mt-4 mb-4">Size</h3>
        <div class="row gy-4">
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/Small_size.jpg" class="card-img-top" alt="Small_size">
                    <div class="card-body">
                      <h5 class="card-title">Small</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow" >
                    <img src="../assets/Medium_size.jpg" class="card-img-top" alt="Medium_size">
                    <div class="card-body">
                      <h5 class="card-title">Medium</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Large_size.jpg" class="card-img-top" alt="Large_size">
                    <div class="card-body">
                      <h5 class="card-title">Large</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card h-100 custom-shadow">
                    <img src="../assets/Extralarge_size.jpg" class="card-img-top" alt="Extralarge_size">
                    <div class="card-body">
                      <h5 class="card-title">Extra Large</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- mesaage and instruction -->
        <h3 class="border custom-shadow rounded p-3 ps-3 mt-4 mb-4">Message on cake & Instruction</h3>
        <div class="row gy-4">
            <div class="col-md-6 ">
                <div class="form-floating custom-shadow">
                    <input type="text" class="form-control" placeholder="Leave a comment here" id="messageBox" style="height: 150px;"></textarea>
                    <label for="messageBox">Message to be Written on Cake</label>
                  </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-floating custom-shadow">
                    <textarea class="form-control" placeholder="Leave a comment here" id="instructionBox" style="height: 150px; resize: none;"></textarea>
                    <label for="instructionBox">Instruction </label>
                  </div>
            </div>
        </div>
        <div class="row gy-4 mt-md-4 d-none" id="orderDetails">
            <h3 class="border custom-shadow rounded p-3 ps-3 mt-4 mb-4"">Your Choice</h3>
            <div class="col-md-6" id="resCol-1">
                <!-- img -->
            </div>
            <div class="col-md-6" id="resCol-2">
                <div class="row">
                    <!-- description -->
                    <table id="table" class="table ">
                        
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- price -->
                        <p></p>
                    </div>
                    <div class="col-md-6">
                        <!-- delivery Time -->
                        <p>Delivered By</p>
                        <p></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn text-white d-block mx-auto p-3 w-50 mt-4" style="background-color: #FC8F59;">Cancle</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn text-white d-block mx-auto p-3 w-50 mt-4" style="background-color: #E33F5C;">Order</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn text-white p-3 w-25 mx-auto d-block mt-4" style="background-color: #E33F5C;" id="final">Finalize</button>
    </div>
    <script>
        document.getElementById("baseContainer").addEventListener("click", (e) => {
            let card = e.target.closest(".card"); // Get the closest card element
            if (card) {
                let cardBody = card.querySelector(".card-body"); // Find the card-body inside the card
                if (cardBody) {
                    let row = card.closest(".row"); // Get the parent row of the clicked card
                    // Deselect all other cards in the same row
                    row.querySelectorAll(".card").forEach(c => {
                        if (c !== card) {
                            c.classList.remove("active-card");
                        }
                    });
                    // Toggle active class on clicked card
                    card.classList.toggle("active-card");
                }
            }
        });
        document.getElementById("final").addEventListener("click",()=>{
            let activeCards=document.querySelectorAll(".active-card")
            let message=document.querySelector("#messageBox")
            let instruction=document.querySelector("#instructionBox")
            
            let orederDiv=document.querySelector("#orderDetails")
            let tbody=document.querySelector("tbody")
            let finalBtn=document.querySelector("#final")

            let date = new Date();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let ampm = hours >= 12 ? "PM" : "AM";
            hours = hours % 12 || 12;

            if (activeCards.length<4){
                return
            }else{
                activeCards.forEach((c)=>{
                    console.log(c.textContent.trim());
                    let row=document.createElement("tr")
                    let td=document.createElement("td")
                    td.textContent=c.textContent.trim()

                    row.appendChild(td)
                    tbody.appendChild(row)

                    if(c.textContent.trim()==="Small"){
                        hours+=1
                    }else if(c.textContent.trim()==="Medium"){
                        hours+=2
                    }else if(c.textContent.trim()==="Large"){
                        hours+=3
                    }else if(c.textContent.trim()==="Extra Large"){
                        hours+=4
                    }
                })
                
                now.toLocaleTimeString(); // Example output: "2:45:30 PM"


                if(message.value==="" && instruction.value===""){
                    message.readOnly=true
                    instruction.readOnly=true
                }else{


                    message.readOnly=true
                    instruction.readOnly=true
                    let rowMsg=document.createElement("tr")
                    let tdMsg=document.createElement("td")
                    tdMsg.textContent=message.value
                    rowMsg.appendChild(tdMsg)
                    tbody.appendChild(rowMsg)
                    
                    let rowInstruction=document.createElement("tr")
                    let tdInstruction=document.createElement("td")
                    tdInstruction.textContent=instruction.value
                    rowInstruction.appendChild(tdInstruction)
                    tbody.appendChild(rowInstruction)
                }

                orederDiv.classList.remove("d-none")
                finalBtn.classList.add("d-none")


            }


        })
    </script>
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include_once "../component/footer.php"; ?>