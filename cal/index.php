<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBM 계산기</title>
</head>
<body>
    <h1>CBM 계산기 </h1>
    <form id="cbmForm">
        <label for="length">길이 (mm): </label>
        <input type="number" id="length" name="length" step="0.01" required><br><br>

        <label for="width">너비 (mm): </label>
        <input type="number" id="width" name="width" step="0.01" required><br><br>

        <label for="height">높이 (mm): </label>
        <input type="number" id="height" name="height" step="0.01" required><br><br>

        <label for="weight">무게 (kg): </label>
        <input type="number" id="weight" name="weight" step="0.01" required><br><br>
        
        <label for="quantity">수량: </label>
        <input type="number" id="quantity" name="quantity" required><br><br>


        <button type="button" onclick="calculateCBM()">계산 하기</button>
    </form>

    <h2>결과:</h2>
    <p id="cbmResult"></p>

    <script>
        function calculateCBM() {
            var length = parseFloat(document.getElementById('length').value) / 1000; // mm to m
            var width = parseFloat(document.getElementById('width').value) / 1000; // mm to m
            var height = parseFloat(document.getElementById('height').value) / 1000; // mm to m
            var quantity = parseInt(document.getElementById('quantity').value);
            var weight = parseFloat(document.getElementById('weight').value);
            
            if (length && width && height && quantity && weight) {
                var cbm = length * width * height * quantity;
                var weightInTons = weight / 1000; // kg to ton
                document.getElementById('cbmResult').innerText = "CBM: " + cbm.toFixed(3) + " m³";
                
                // CBM과 무게(ton) 비교
                var largerValue = cbm >= weightInTons ? cbm : weightInTons;
                var largerValueUnit = cbm >= weightInTons ? "CBM" : "무게";

                // 더 큰 값을 표시
                document.getElementById('cbmResult').innerText += "\nR/TON: " + largerValue.toFixed(3) + " (" + largerValueUnit + ")";
            } else {
                document.getElementById('cbmResult').innerText = "모든 입력값을 확인하세요!";
            }
        }
    </script>
</body>
</html>
