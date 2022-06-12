try:
   hcf_or_lcm = input("HCF or LCM: ").lower()
   if hcf_or_lcm == 'hcf':
      def factors(a):
         a = int(a)
         factors = []
         for i in range(1, a + 1):
            if a % i == 0:
               factors.append(i)
         return factors


      def hcf(a, b):
         set_a = set(factors(a))
         intersection = set_a.intersection(factors(b))
         intersection = list(intersection)
         return f"The highest common factor of {a} and {b} is {max(intersection)}"


      print(hcf(a=input("First number: "), b=input("Second number: ")))

   elif hcf_or_lcm == 'lcm':
      def factors(a):
         a = int(a)
         factors = []
         for i in range(1, a+1):
            if a % i == 0:
               factors.append(i)
         return factors

      def hcf(a, b):
         set_a = set(factors(a))
         intersection = set_a.intersection(factors(b))
         intersection = list(intersection)
         return max(intersection)
      a = float(input("Number 1: "))
      b = float(input("Number 2: "))
      multiply = a * b
      lcm = multiply/float(hcf(a, b))
      print(f"The lowest common multiple of {a} and {b} is {lcm}")
   else:
      print("Enter either 'HCF' or 'LCM' ")
except ValueError:
   print("Enter an integer")
   print(quit())
