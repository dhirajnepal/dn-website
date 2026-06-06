import re

with open("/tmp/workspace/dhirajnepal/dn-website/script.js", "r") as f:
    content = f.read()

# Modify `saveU` to never store email!
old_saveU = "function saveU(u){localStorage.setItem('dn_u',JSON.stringify(u))}"
new_saveU = """function saveU(u){
  const safeU = {...u};
  delete safeU.email;
  localStorage.setItem('dn_u',JSON.stringify(safeU));
}"""
content = content.replace(old_saveU, new_saveU)

with open("/tmp/workspace/dhirajnepal/dn-website/script.js", "w") as f:
    f.write(content)

