/* ── PRELOADER ── */
addEventListener('load',()=>setTimeout(()=>{const p=document.getElementById('pre');p.classList.add('hide');setTimeout(()=>p.style.display='none',700)},1800));

/* ── CANVAS ── */
(()=>{
  const cv=document.getElementById('cv'),ctx=cv.getContext('2d');
  let W,H,pts=[];
  const rz=()=>{W=cv.width=innerWidth;H=cv.height=innerHeight};
  addEventListener('resize',rz);rz();
  class Star{constructor(){this.init()}init(){this.x=Math.random()*W;this.y=Math.random()*H;this.r=Math.random()*1.2+.2;this.vx=(Math.random()-.5)*.22;this.vy=(Math.random()-.5)*.22;this.a=Math.random()*.5+.1;this.life=0;this.ml=200+Math.random()*400;const c=['#c9982a','#00b8e8','#22ff88','#a855f7','rgba(255,255,255,.7)'];this.col=c[0|Math.random()*c.length]}update(){this.x+=this.vx;this.y+=this.vy;this.life++;if(this.life>this.ml||this.x<0||this.x>W||this.y<0||this.y>H)this.init()}draw(){ctx.save();ctx.globalAlpha=this.a*(1-this.life/this.ml);ctx.fillStyle=this.col;ctx.shadowColor=this.col;ctx.shadowBlur=4;ctx.beginPath();ctx.arc(this.x,this.y,this.r,0,Math.PI*2);ctx.fill();ctx.restore()}}
  for(let i=0;i<150;i++)pts.push(new Star());
  function draw(){ctx.clearRect(0,0,W,H);for(let i=0;i<pts.length;i++)for(let j=i+1;j<pts.length;j++){const dx=pts[i].x-pts[j].x,dy=pts[i].y-pts[j].y,d=Math.hypot(dx,dy);if(d<85){ctx.save();ctx.globalAlpha=(1-d/85)*.05;ctx.strokeStyle='#c9982a';ctx.lineWidth=.4;ctx.beginPath();ctx.moveTo(pts[i].x,pts[i].y);ctx.lineTo(pts[j].x,pts[j].y);ctx.stroke();ctx.restore()}}pts.forEach(p=>{p.update();p.draw()});requestAnimationFrame(draw)}
  draw();
  function shoot(){const x=Math.random()*W,y=Math.random()*(H*.4),len=90+Math.random()*130,ang=Math.PI/4+Math.random()*.5;let p=0;(function a(){if(p>=1)return;p+=.042;ctx.save();ctx.globalAlpha=(1-p)*.35;ctx.strokeStyle='#e8b84b';ctx.lineWidth=1;ctx.shadowColor='#e8b84b';ctx.shadowBlur=6;ctx.beginPath();ctx.moveTo(x,y);ctx.lineTo(x+Math.cos(ang)*len*p,y+Math.sin(ang)*len*p);ctx.stroke();ctx.restore();requestAnimationFrame(a)})();setTimeout(shoot,3000+Math.random()*7000)}
  setTimeout(shoot,3000);
})();

/* ── CURSOR (desktop only) ── */
(()=>{
  const c=document.getElementById('cur'),r=document.getElementById('cur-r');
  if(!c||!r)return;
  let mx=0,my=0,rx=0,ry=0;
  addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;c.style.left=mx+'px';c.style.top=my+'px'});
  (function l(){rx+=(mx-rx)*.12;ry+=(my-ry)*.12;r.style.left=rx+'px';r.style.top=ry+'px';requestAnimationFrame(l)})();
  document.querySelectorAll('a,button,.pc,.lc,.rv,.sc,.wk,.ps,.pi,.pp,.te,.fi-q').forEach(el=>{
    el.addEventListener('mouseenter',()=>{c.style.width='16px';c.style.height='16px';c.style.background='#fff';r.style.width='44px';r.style.height='44px'});
    el.addEventListener('mouseleave',()=>{c.style.width='8px';c.style.height='8px';c.style.background='var(--g2)';r.style.width='32px';r.style.height='32px'});
  });
})();

/* ── SCROLL ── */
addEventListener('scroll',()=>{
  document.getElementById('sp').style.width=(scrollY/(document.body.scrollHeight-innerHeight)*100)+'%';
  document.getElementById('nav').classList.toggle('scrolled',scrollY>80);
});

/* ── MOBILE MENU ── */
function toggleMob(){const b=document.getElementById('burger'),m=document.getElementById('mmenu');b.classList.toggle('open');m.classList.toggle('open');document.body.classList.toggle('locked',m.classList.contains('open'))}
function closeMob(){document.getElementById('burger').classList.remove('open');document.getElementById('mmenu').classList.remove('open');document.body.classList.remove('locked')}

/* ── OBSERVERS ── */
const io=new IntersectionObserver(e=>e.forEach(x=>{if(x.isIntersecting)x.target.classList.add('vis')}),{threshold:.1});
document.querySelectorAll('.reveal,.stats').forEach(el=>io.observe(el));
const lcIO=new IntersectionObserver(e=>e.forEach((x,i)=>{if(x.isIntersecting)setTimeout(()=>x.target.classList.add('vis'),i*120)}),{threshold:.1});
document.querySelectorAll('.lc').forEach(c=>lcIO.observe(c));
const cIO=new IntersectionObserver(e=>e.forEach(x=>{if(!x.isIntersecting)return;const el=x.target,t=parseInt(el.dataset.t);if(isNaN(t))return;let c2=0;const s=t/50,tm=setInterval(()=>{c2=Math.min(c2+s,t);el.textContent=Math.floor(c2);if(c2>=t)clearInterval(tm)},30);cIO.unobserve(el)}),{threshold:.5});
document.querySelectorAll('[data-t]').forEach(el=>cIO.observe(el));

/* ── PRICING — FIXED CORRECT CALCULATION ── */
const priceData={
  builder:{monthly:9,yearlyMonthly:7,yearlyTotal:84,normalYearly:108},
  pro:{monthly:19,yearlyMonthly:15,yearlyTotal:180,normalYearly:228},
  empire:{monthly:49,yearlyMonthly:39,yearlyTotal:468,normalYearly:588}
};
let pYr=false;
function setP(m){
  pYr=m==='yr';
  document.getElementById('pt-mo').classList.toggle('active',!pYr);
  document.getElementById('pt-yr').classList.toggle('active',pYr);
  setPP('b','builder');setPP('p','pro');setPP('e','empire');
}
function setPP(id,plan){
  const d=priceData[plan];
  document.getElementById('p-'+id).textContent=pYr?d.yearlyMonthly:d.monthly;
  document.getElementById('pp-'+id).textContent=pYr?'per month, billed yearly':'per month';
  document.getElementById('pn-'+id).textContent=pYr?`Billed $${d.yearlyTotal}/year — Save $${d.normalYearly-d.yearlyTotal}`:(plan==='builder'?'First month FREE after signup':'');
}

/* ── PAYMENT ── */
const payLinks={builder:'https://www.paypal.me/moviesdn7/9',pro:'https://www.paypal.me/moviesdn7/19',empire:'https://www.paypal.me/moviesdn7/49'};
function payNow(plan){
  const u=getU();if(!u){openAuth('up');return}
  const price=priceData[plan]?.[pYr?'yearlyMonthly':'monthly'];
  if(confirm(`Subscribe to ${plan.charAt(0).toUpperCase()+plan.slice(1)} plan?\n\nYou'll be redirected to PayPal for $${price}/month.\n\nAfter payment, email moviesdn7@gmail.com with your email address to activate.`)){
    window.open(payLinks[plan],'_blank');
    toast('🔗 Opening PayPal — email us after payment to activate!','info');
  }
}

/* ── EARNINGS CALC ── */
function calcE(){
  const v=parseInt(document.getElementById('cv-v').value)||0;
  const rpm=parseFloat(document.getElementById('cv-n').value)||3;
  const ch=parseInt(document.getElementById('cv-c').value)||1;
  const mo=Math.round((v/1000)*rpm*30*ch);
  const fmt=n=>n>=1000?'$'+(n/1000).toFixed(1)+'K':'$'+n;
  document.getElementById('cr-mo').textContent=fmt(mo);
  document.getElementById('cr-6').textContent=fmt(mo*6);
  document.getElementById('cr-yr').textContent=fmt(mo*12);
  document.getElementById('cr-dy').textContent=fmt(Math.round(mo/30));
}
calcE();

/* ── FAQ ── */
function toggleFaq(btn){btn.parentElement.classList.toggle('open')}

/* ── COOKIE ── */
if(!localStorage.getItem('dn_ck'))setTimeout(()=>document.getElementById('ck').classList.add('show'),2500);
function acceptCk(){localStorage.setItem('dn_ck','1');document.getElementById('ck').classList.remove('show')}

/* ── TOAST ── */
function toast(msg,type='success'){
  const w=document.getElementById('tw');
  const t=document.createElement('div');
  t.className='toast';
  const ic={success:'✅',info:'ℹ️',error:'❌',warn:'⚠️'};
  t.innerHTML=`<span class="t-ic">${ic[type]||'ℹ️'}</span><span>${msg}</span><button class="t-cl" onclick="this.parentElement.remove()">✕</button>`;
  w.appendChild(t);
  setTimeout(()=>t.classList.add('show'),10);
  setTimeout(()=>{t.classList.remove('show');setTimeout(()=>t.remove(),400)},4500);
}

/* ── BLOCKED EMAIL DOMAINS ── */
const blocked=['tempmail.com','10minutemail.com','guerrillamail.com','mailinator.com','yopmail.com','trashmail.com','getnada.com','sharklasers.com','throwam.com','fakeinbox.com','spamgourmet.com','dispostable.com','maildrop.cc','temp-mail.org'];
function isTempEmail(email){return blocked.includes(email.split('@')[1]?.toLowerCase())}
function validEmail(email){
  if(!/^[^@]+@[^@]+\.[^@]+$/.test(email))return false;
  if(isTempEmail(email))return false;
  return true;
}

/* ══════════════════════════════════════════
   FIREBASE CONFIG
   → Paste YOUR config from Firebase Console
   → Project Settings → Your Apps → SDK setup
   ══════════════════════════════════════════ */
const firebaseConfig = {
  apiKey:            "PASTE_YOUR_API_KEY_HERE",
  authDomain:        "PASTE_YOUR_AUTH_DOMAIN_HERE",
  projectId:         "PASTE_YOUR_PROJECT_ID_HERE",
  storageBucket:     "PASTE_YOUR_STORAGE_BUCKET_HERE",
  messagingSenderId: "PASTE_YOUR_SENDER_ID_HERE",
  appId:             "PASTE_YOUR_APP_ID_HERE"
};

/* ── FIREBASE INIT ── */
firebase.initializeApp(firebaseConfig);
const auth = firebase.auth();
const db   = firebase.firestore();
const googleProvider = new firebase.auth.GoogleAuthProvider();

/* ── LOCAL CACHE (fast UI updates) ── */
function getU(){try{const d=localStorage.getItem('dn_u');return d?JSON.parse(d):null}catch{return null}}
function saveU(u){localStorage.setItem('dn_u',JSON.stringify(u))}
function clearU(){localStorage.removeItem('dn_u')}

/* ── UPDATE NAVBAR ── */
function updateNav(){
  const u=getU();
  document.getElementById('n-auth').style.display=u?'none':'flex';
  document.getElementById('n-user').style.display=u?'flex':'none';
  if(u){
    document.getElementById('nav-av').textContent=(u.name||'U')[0].toUpperCase();
    document.getElementById('nav-un').textContent=(u.name||'User').split(' ')[0];
    document.getElementById('nav-up').textContent=((u.plan||'starter')[0].toUpperCase()+(u.plan||'starter').slice(1));
  }
}

/* ── CLEAR UI ON LOGOUT ── */
function clearUserUI(){
  clearU();
  document.getElementById('n-auth').style.display='flex';
  document.getElementById('n-user').style.display='none';
  closeDash();
}

/* ── LOAD USER FROM FIRESTORE → cache locally ── */
async function loadUserFS(uid){
  try{
    const doc=await db.collection('users').doc(uid).get();
    if(doc.exists){
      const data={...doc.data(),uid};
      // Convert Firestore timestamp to string if needed
      if(data.joined&&data.joined.toDate)data.joined=data.joined.toDate().toISOString();
      saveU(data);
      updateNav();
      renderDash();
    }
  }catch(err){
    console.error('Firestore load error:',err);
    // Fall back to local cache if offline
    if(getU()){updateNav();renderDash();}
  }
}

/* ── SAVE USER TO FIRESTORE ── */
async function saveUserFS(uid,data){
  try{
    await db.collection('users').doc(uid).set(data,{merge:true});
  }catch(err){
    console.error('Firestore save error:',err);
    toast('Saved locally — will sync when online.','warn');
  }
}

/* ── AUTH STATE LISTENER (runs on every page load) ── */
auth.onAuthStateChanged(async user=>{
  if(user){
    await loadUserFS(user.uid);
  }else{
    clearUserUI();
  }
});

/* ── AUTH MODAL ── */
function openAuth(tab){document.getElementById('auth-ov').classList.add('open');document.body.classList.add('locked');swTab(tab)}
function closeAuth(){document.getElementById('auth-ov').classList.remove('open');document.body.classList.remove('locked')}
document.getElementById('auth-ov').addEventListener('click',function(e){if(e.target===this)closeAuth()});
document.addEventListener('keydown',e=>{if(e.key==='Escape'){closeAuth();closeDash()}});
function swTab(t){['in','up'].forEach(x=>{document.getElementById('at-'+x).classList.toggle('active',x===t);document.getElementById('f-'+x).classList.toggle('active',x===t)})}

/* ── PLAN SELECTION ── */
let chosenPlan='starter';
function selPlan(p){
  chosenPlan=p;
  ['pp-s','pp-b','pp-p2','pp-e'].forEach(id=>document.getElementById(id).classList.remove('sel'));
  const m={starter:'pp-s',builder:'pp-b',pro:'pp-p2',empire:'pp-e'};
  document.getElementById(m[p]).classList.add('sel');
}

/* ── PASSWORD STRENGTH ── */
function checkPw(){
  const v=document.getElementById('su-p').value;
  const s=v.length>=8&&/[A-Z]/.test(v)&&/[0-9]/.test(v)?4:v.length>=6&&/[0-9]/.test(v)?3:v.length>=4?2:v.length>0?1:0;
  const cols=['#ff3355','#ff8c00','#22ff88','#22ff88'];
  ['pw1','pw2','pw3','pw4'].forEach((id,i)=>document.getElementById(id).style.background=i<s?cols[s-1]:'rgba(255,255,255,.08)');
}

/* ── SHAKE ANIMATION ── */
function shakeEl(id){const el=document.getElementById(id);el.classList.add('err');setTimeout(()=>el.classList.remove('err'),500)}

/* ── SIGN IN (Email + Password) ── */
async function doSignIn(){
  const e=document.getElementById('si-e').value.trim();
  const p=document.getElementById('si-p').value;
  if(!validEmail(e)){shakeEl('si-e');toast('Enter a valid email address.','error');return}
  if(p.length<4){shakeEl('si-p');toast('Enter your password.','warn');return}
  try{
    const btn=document.querySelector('#f-in .a-sub');
    btn.textContent='Signing in...';btn.disabled=true;
    await auth.signInWithEmailAndPassword(e,p);
    closeAuth();
    toast('👋 Welcome back!');
    btn.textContent='Sign In to DNForge';btn.disabled=false;
  }catch(err){
    document.querySelector('#f-in .a-sub').textContent='Sign In to DNForge';
    document.querySelector('#f-in .a-sub').disabled=false;
    if(err.code==='auth/user-not-found')toast('No account found. Please create one.','error');
    else if(err.code==='auth/wrong-password')toast('Incorrect password. Try again.','error');
    else if(err.code==='auth/too-many-requests')toast('Too many attempts. Try again later.','warn');
    else toast('Sign in failed: '+err.message,'error');
  }
}

/* ── SIGN UP (Email + Password) ── */
async function doSignUp(){
  const n=document.getElementById('su-n').value.trim();
  const e=document.getElementById('su-e').value.trim();
  const p=document.getElementById('su-p').value;
  if(n.length<2){shakeEl('su-n');toast('Enter your full name.','warn');return}
  if(!validEmail(e)){shakeEl('su-e');toast('Use a real email — temporary emails are blocked.','error');return}
  if(p.length<6){shakeEl('su-p');toast('Password must be at least 6 characters.','warn');return}
  try{
    const btn=document.querySelector('#f-up .a-sub');
    btn.textContent='Creating account...';btn.disabled=true;
    // Create Firebase Auth account
    const result=await auth.createUserWithEmailAndPassword(e,p);
    const uid=result.user.uid;
    // Set display name
    await result.user.updateProfile({displayName:n});
    // Build user data
    const mc={starter:10,builder:100,pro:500,empire:99999};
    const userData={
      name:n,email:e,plan:chosenPlan,level:1,
      credits:0,maxC:mc[chosenPlan]||10,
      platforms:[],posts:0,
      joined:firebase.firestore.FieldValue.serverTimestamp(),
      stats:{fb:0,ig:0,yt:0,tt:0}
    };
    // Save to Firestore
    await db.collection('users').doc(uid).set(userData);
    // Cache locally
    saveU({...userData,uid,joined:new Date().toISOString()});
    closeAuth();
    btn.textContent='Create Free Account';btn.disabled=false;
    if(chosenPlan!=='starter'){payNow(chosenPlan);}
    else{updateNav();renderDash();openDash();toast('🎉 Welcome to DNForge! Start Level 1 today.');}
  }catch(err){
    document.querySelector('#f-up .a-sub').textContent='Create Free Account';
    document.querySelector('#f-up .a-sub').disabled=false;
    if(err.code==='auth/email-already-in-use')toast('This email already has an account. Please sign in.','error');
    else if(err.code==='auth/weak-password')toast('Password is too weak.','warn');
    else toast('Sign up failed: '+err.message,'error');
  }
}

/* ── GOOGLE SIGN IN ── */
async function socialAuth(prov){
  if(prov==='google'){
    try{
      const result=await auth.signInWithPopup(googleProvider);
      const user=result.user;
      const isNew=result.additionalUserInfo.isNewUser;
      if(isNew){
        const userData={
          name:user.displayName||'Google User',
          email:user.email,plan:'starter',level:1,
          credits:0,maxC:10,platforms:[],posts:0,
          joined:firebase.firestore.FieldValue.serverTimestamp(),
          stats:{fb:0,ig:0,yt:0,tt:0}
        };
        await db.collection('users').doc(user.uid).set(userData);
        saveU({...userData,uid:user.uid,joined:new Date().toISOString()});
      }
      closeAuth();
      toast('👋 Signed in with Google!');
    }catch(err){
      if(err.code==='auth/popup-closed-by-user')return;
      toast('Google sign in failed: '+err.message,'error');
    }
  }else{
    // Microsoft — coming with Azure AD (Phase 2)
    toast('Microsoft sign in coming soon. Use email or Google for now.','info');
  }
}

/* ── SIGN OUT ── */
async function doLogout(){
  if(confirm('Sign out of DNForge?')){
    try{
      await auth.signOut();
      clearUserUI();
      toast('👋 Signed out. See you soon!','info');
    }catch(err){
      toast('Sign out failed: '+err.message,'error');
    }
  }
}

/* ── DASHBOARD ── */
function openDash(){renderDash();document.getElementById('dp').classList.add('open');document.body.classList.add('locked')}
function closeDash(){document.getElementById('dp').classList.remove('open');document.body.classList.remove('locked')}
function swDash(tab){
  document.querySelectorAll('.dt').forEach((b,i)=>b.classList.toggle('active',['overview','platforms','progress','earnings'][i]===tab));
  document.querySelectorAll('.dtc').forEach(c=>c.classList.remove('active'));
  document.getElementById('dt-'+tab).classList.add('active');
}
function renderDash(){
  const u=getU();if(!u)return;
  document.getElementById('dp-av').textContent=u.name[0].toUpperCase();
  document.getElementById('dp-wn').textContent='Welcome, '+u.name.split(' ')[0]+'!';
  document.getElementById('dp-wp').textContent=(u.plan||'starter').charAt(0).toUpperCase()+(u.plan||'starter').slice(1)+' Plan';
  document.getElementById('dp-we').textContent=u.email;
  const lv=u.level||1;
  for(let i=1;i<=5;i++){const el=document.getElementById('ld'+i);if(!el)continue;el.classList.remove('active','done');if(i===lv)el.classList.add('active');else if(i<lv)el.classList.add('done');el.querySelector('.ld-d').textContent=i<lv?'✓':i}
  const lvN=['','Basic Automation','Smart Scheduling','Video Factory','Multi-Channel Empire','Full AI Company'];
  document.getElementById('dp-lvt').textContent='Level '+lv+' — '+lvN[lv];
  const used=u.credits||0,max=u.maxC||10;
  document.getElementById('dp-cr').textContent=used+' / '+(max===99999?'∞':max);
  document.getElementById('dp-crf').style.width=(max===99999?'10':Math.min(100,Math.round(used/max*100)))+'%';
  document.getElementById('dp-posts').textContent=u.posts||0;
  document.getElementById('dp-reach').textContent=((u.posts||0)*900).toLocaleString();
  document.getElementById('dp-earn').textContent='$'+((u.posts||0)*0.12).toFixed(2);
  const nxt=['','Install Python + VS Code. Run print("Hello World") first.','Connect Facebook Graph API and test your first automated post.','Set up Stable Diffusion and generate your first AI image.','Add scheduling — posts go live at peak hours automatically.','Scale to multiple channels across platforms.'];
  document.getElementById('dp-nxt').textContent=nxt[lv]||nxt[1];
  // Platforms
  const plts=u.platforms||[];
  [['fb','📘','Facebook'],['ig','📸','Instagram'],['yt','▶️','YouTube'],['tt','🎵','TikTok']].forEach(([k,ic,nm])=>{
    const el=document.getElementById('pi-'+k);if(!el)return;
    if(plts.includes(k)){el.classList.add('conn');el.innerHTML=`<span class="pi-ic">${ic}</span><span class="pi-nm">${nm}</span><span class="pi-st">✓ Connected</span>`}
    else{el.classList.remove('conn');el.innerHTML=`<span class="pi-ic">${ic}</span><span class="pi-nm">${nm}</span><button class="pi-btn" onclick="connPlt('${k}')">+ Connect</button>`}
  });
  // Stats inputs
  const st=u.stats||{};
  ['fb','ig','yt','tt'].forEach(k=>{const el=document.getElementById('st-'+k);if(el&&st[k])el.value=st[k]});
  // Progress
  const pct=Math.round(((lv-1)/4)*100);
  document.getElementById('pp-pct').textContent=pct+'%';
  document.getElementById('pp-bar').style.width=pct+'%';
  // Checklist
  const tasks=[
    {lv:1,t:'Level 1 — Basic Automation',items:['Install Python + VS Code','Get OpenAI API key','Generate first AI quote','Auto-upload to Facebook']},
    {lv:2,t:'Level 2 — Smart Scheduling',items:['Add hashtag automation','Set up post scheduler','Connect 5+ pages','Track analytics']},
    {lv:3,t:'Level 3 — Video Factory',items:['Set up Stable Diffusion','Add ElevenLabs voice','Configure Whisper subtitles','Publish first Reel/Short']},
    {lv:4,t:'Level 4 — Multi-Channel Empire',items:['Add 5+ channels','Set up multi-niche scripts','Enable analytics','Scale automation']},
    {lv:5,t:'Level 5 — Full AI Company',items:['AI picks niches automatically','Self-optimizing content','Autonomous operation','100% automated']}
  ];
  document.getElementById('lv-cl').innerHTML=tasks.map(t=>`<div style="background:var(--gl);border:1px solid ${t.lv<=lv?'rgba(34,255,136,.2)':'var(--bd)'};padding:12px 14px"><div style="font-family:'JetBrains Mono',monospace;font-size:9px;letter-spacing:2px;color:${t.lv<=lv?'var(--green)':'var(--dim2)'};text-transform:uppercase;margin-bottom:8px">${t.lv<lv?'✓ ':t.lv===lv?'→ ':'○ '}${t.t}</div>${t.items.map(i=>`<div style="font-size:11px;color:${t.lv<lv?'var(--green)':t.lv===lv?'var(--dim2)':'var(--dim)'};padding:2px 0;padding-left:12px">${t.lv<lv?'✓':t.lv===lv?'·':'○'} ${i}</div>`).join('')}</div>`).join('');
  // Growth chart
  const maxF=Math.max(st.fb||0,st.ig||0,st.yt||0,st.tt||0,1);
  ['fb','ig','yt','tt'].forEach(k=>{const v=st[k]||0;const bar=document.getElementById('gc-'+k),val=document.getElementById('gv-'+k);if(bar)bar.style.width=Math.round(v/maxF*100)+'%';if(val)val.textContent=v>=1000?(v/1000).toFixed(1)+'K':v});
  // Earnings
  const yt=Math.round((st.yt||0)/1000*3*30),fb2=Math.round((st.fb||0)/1000*1.5*30),sp=Math.round((st.ig||0)/1000*50*0.1),af=Math.round(((st.tt||0)+(st.ig||0))/2000*20),tot=yt+fb2+sp+af;
  const maxE=Math.max(yt,fb2,sp,af,1);
  [{id:'yt',v:yt},{id:'fb',v:fb2},{id:'sp',v:sp},{id:'af',v:af}].forEach(({id,v})=>{const bar=document.getElementById('e-'+id),val=document.getElementById('ev-'+id);if(bar)bar.style.width=Math.round(v/maxE*100)+'%';if(val)val.textContent='$'+v});
  document.getElementById('e-tot').textContent='$'+tot;
}
function connPlt(k){
  const u=getU();if(!u)return;
  const nm={fb:'Facebook',ig:'Instagram',yt:'YouTube',tt:'TikTok'};
  toast(`To connect ${nm[k]}: get API token from ${nm[k]} Developer portal and add to your automation script.`,'info');
  if(!u.platforms)u.platforms=[];
  if(!u.platforms.includes(k))u.platforms.push(k);
  u.posts=(u.posts||0)+1;
  saveU(u);renderDash();
}
function saveStats(){
  const u=getU();if(!u)return;
  if(!u.stats)u.stats={};
  ['fb','ig','yt','tt'].forEach(k=>{const el=document.getElementById('st-'+k);if(el)u.stats[k]=parseInt(el.value)||0});
  saveU(u);
  // Sync to Firestore
  const cur=auth.currentUser;
  if(cur){
    db.collection('users').doc(cur.uid).update({stats:u.stats})
      .then(()=>toast('📊 Stats saved to cloud!'))
      .catch(()=>toast('📊 Stats saved locally.','warn'));
  }else{
    toast('📊 Stats saved locally.','info');
  }
  renderDash();
}

/* ── PARALLAX ── */
addEventListener('mousemove',e=>{
  const mx=(e.clientX/innerWidth-.5)*25,my=(e.clientY/innerHeight-.5)*25;
  const o1=document.querySelector('.orb1'),o2=document.querySelector('.orb2');
  if(o1)o1.style.transform=`translate(${mx}px,${my}px)`;
  if(o2)o2.style.transform=`translate(${-mx}px,${-my}px)`;
});

/* ── INIT ── */
// Firebase onAuthStateChanged handles auth UI automatically.
// Only run non-auth UI setup here.
calcE();
// Fetch backend status
fetch('api.php?action=status')
  .then(res => res.json())
  .then(data => {
    console.log('Backend Status:', data);
    // Optionally display it on the page if needed
  })
  .catch(err => console.error('Failed to fetch backend status:', err));
