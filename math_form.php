<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Mid-Term Felipe Camargo</title>

    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    </style>
</head>

<body class="bg-slate-100 text-slate-800">
    <main class="max-w-3xl mx-auto p-12 pt-6 space-y-4 bg-white shadow-xl rounded-lg">
        <h1 class="text-3xl font-bold text-center text-blue-600">Mid-Term Exam Felipe Franco de Camargo</h1>
        <h3 class="text-xl text-center">Welcome to the Mathematical Application!</h3>
        <form action="process_math.php" method="POST"
            class="shadow-lg rounded-lg px-8 py-6 bg-slate-50 flex flex-col gap-6">
            <div class="flex flex-col gap-2 text-center">
                <p class="flex gap-2 items-center justify-center">
                    This application is hosted on my EC2 instance with Public IP:
                    <input id="public_ip" name="public_ip"
                        class="font-mono text-blue-500 bg-slate-300 rounded-lg px-2 py-1 inline-block focus:outline-none"
                        readonly value="<?php
                    $token = shell_exec("curl -X PUT -H 'X-aws-ec2-metadata-token-ttl-seconds: 21600' http://169.254.169.254/latest/api/token");
                    if ($token) {
                        $public_ip = shell_exec("curl -H 'X-aws-ec2-metadata-token: $token' http://169.254.169.254/latest/meta-data/public-ipv4");
                        echo $public_ip ? $public_ip : 'Unavailable';
                    } else {
                        echo 'Unavailable';
                    }
                    ?>">
                </p>
                <p>Enter Two numbers and select an operation to calculate the result</p>
            </div>
            <div class="flex items-center gap-4 w-full">
                <label for="num1" class="w-1/4 text-right">First number: </label>
                <input
                    class="border border-slate-400 px-4 py-2 rounded-lg w-3/4 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    type="number" name="num1" id="num1" required />
            </div>
            <div class="flex items-center gap-4 w-full">
                <label for="num2" class="w-1/4 text-right">Second number: </label>
                <input
                    class="border border-slate-400 px-4 py-2 rounded-lg w-3/4 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    type="number" name="num2" id="num2" required />
            </div>
            <div class="flex items-center gap-4 w-full">
                <label for="oper" class="w-1/4 text-right">Operation:</label>
                <select
                    class="border border-slate-400 px-4 py-2 rounded-lg w-3/4 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    name="oper" id="oper" required>
                    <option value="addition">Addition</option>
                    <option value="subtraction">Subtraction</option>
                    <option value="multiplication">Multiplication</option>
                    <option value="division">Division</option>
                </select>
            </div>

            <button type="submit"
                class="self-end bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 hover:cursor-pointer">
                Calculate
            </button>
        </form>
    </main>
</body>

</html>