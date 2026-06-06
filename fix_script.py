import re

with open("/tmp/workspace/dhirajnepal/dn-website/script.js", "r") as f:
    content = f.read()

# Fix XSS in toast
# Original: t.innerHTML=`<span class="t-ic">${ic[type]||'ℹ️'}</span><span>${msg}</span><button class="t-cl" onclick="this.parentElement.remove()">✕</button>`;
# Change to: 
# t.innerHTML=`<span class="t-ic">${ic[type]||'ℹ️'}</span><span class="t-msg"></span><button class="t-cl" onclick="this.parentElement.remove()">✕</button>`;
# t.querySelector('.t-msg').textContent = msg;
old_toast = "t.innerHTML=`<span class=\"t-ic\">${ic[type]||'ℹ️'}</span><span>${msg}</span><button class=\"t-cl\" onclick=\"this.parentElement.remove()\">✕</button>`;"
new_toast = """t.innerHTML=`<span class=\"t-ic\">${ic[type]||'ℹ️'}</span><span class=\"t-msg\"></span><button class=\"t-cl\" onclick=\"this.parentElement.remove()\">✕</button>`;
  t.querySelector('.t-msg').textContent = msg;"""
content = content.replace(old_toast, new_toast)

# Fix sensitive data storage
# The issue is that we are storing user email in localStorage.
# We can just remove `email` from the cached data.
old_saveU = "saveU({...userData,uid,joined:new Date().toISOString()});"
new_saveU = """const safeUserData = {...userData,uid,joined:new Date().toISOString()};
    delete safeUserData.email; // Do not store email in localStorage to prevent clear-text storage
    saveU(safeUserData);"""
content = content.replace(old_saveU, new_saveU)

# And in Login, we should do the same:
#     saveU({uid:u.uid,name:d.name,email:d.email,plan:d.plan,level:d.level,credits:d.credits,maxC:d.maxC,platforms:d.platforms,posts:d.posts,stats:d.stats||{fb:0,ig:0,yt:0,tt:0}});
old_login_save = "saveU({uid:u.uid,name:d.name,email:d.email,plan:d.plan,level:d.level,credits:d.credits,maxC:d.maxC,platforms:d.platforms,posts:d.posts,stats:d.stats||{fb:0,ig:0,yt:0,tt:0}});"
new_login_save = "saveU({uid:u.uid,name:d.name,plan:d.plan,level:d.level,credits:d.credits,maxC:d.maxC,platforms:d.platforms,posts:d.posts,stats:d.stats||{fb:0,ig:0,yt:0,tt:0}});"
content = content.replace(old_login_save, new_login_save)

# Also auth state changed listener
#       saveU({uid:u.uid,name:u.displayName||'User',email:u.email,plan:'starter',level:1,credits:0,maxC:10,platforms:[],posts:0,stats:{fb:0,ig:0,yt:0,tt:0}});
old_auth_save = "saveU({uid:u.uid,name:u.displayName||'User',email:u.email,plan:'starter',level:1,credits:0,maxC:10,platforms:[],posts:0,stats:{fb:0,ig:0,yt:0,tt:0}});"
new_auth_save = "saveU({uid:u.uid,name:u.displayName||'User',plan:'starter',level:1,credits:0,maxC:10,platforms:[],posts:0,stats:{fb:0,ig:0,yt:0,tt:0}});"
content = content.replace(old_auth_save, new_auth_save)

with open("/tmp/workspace/dhirajnepal/dn-website/script.js", "w") as f:
    f.write(content)

