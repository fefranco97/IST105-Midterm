import sys

num1 = int(sys.argv[1])
num2 = int(sys.argv[2])
oper = sys.argv[3]
public_ip = sys.argv[4]

def perform_operation(num1, num2, oper):
    if oper == 'Addition':
        result = num1 + num2
    elif oper == 'Subtraction':
        result = num1 - num2
    elif oper == 'Multiplication':
        result = num1 * num2
    elif oper == 'Division':
        if num2 != 0:
            result = num1 / num2
        else:
            return "Error: Division by zero is not allowed."
    else:
        return "Error: Invalid operation."

    if result > 100:
        result *= 2
    elif result < 0:
        result += 50

    return result

result = perform_operation(num1, num2, oper)

style = """* {
        font-family: 'Poppins', sans-serif;
      }"""
      
function = """
        window.onload = () => {
            document.getElementById("loadBalancer-url").innerHTML = window.location.href;
        """

print(f"""
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

    <script>
      {{
          {function}
      }}
    </script>

    <style>
        {style}
    </style>
  </head>

  <body class="bg-slate-100 text-slate-800">
    <main class="max-w-3xl mx-auto p-12 pt-6 space-y-4 bg-white shadow-xl rounded-lg">
      <h1 class="text-3xl font-bold text-center text-blue-600">Mid-Term Exam Felipe Franco de Camargo</h1>
      <h3 class="text-xl text-center">Result</h3>
      <div class="flex flex-col gap-2 text-center">
        <ul>
          <li>Number 1: {num1}</li>
          <li>Number 2: {num2}</li>
          <li>Operator: {oper}</li>
          <li>Result: {result}</li>
        </ul>
      </div>
      <footer class="space-y-2">
        <p>
          This result was processsed on my EC2 instance with Public IP:
          <span id="public-ip" class="font-mono text-blue-500 bg-slate-300 rounded-lg px-2 py-1">{public_ip}</span>
        </p>
        <p>
          Acces the application via Load Balancer URL:
          <span id="loadBalancer-url" class="font-mono text-blue-500 bg-slate-300 rounded-lg px-2 py-1"></span>
        </p>
      </footer>
    </main>
  </body>
</html>
""")