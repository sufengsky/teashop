delete from `{P}_base_adminauth` where `coltype`='member';
delete from `{P}_base_coltype` where `coltype`='member';

delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='homepage';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='login';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='lostpass';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='reg';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='main';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='account';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='person';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='detail';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='contact';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='notice';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='fav';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='friends';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='comment';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='msn';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='membercent';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='paylist';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='buylist';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='onlinepay';

delete from `{P}_base_plus` where `coltype`='member';
delete from `{P}_base_plus` where `plustype`='member';

delete from `{P}_base_plusplan` where `coltype`='member';
delete from `{P}_base_plusplan` where `plustype`='member';
delete from `{P}_base_plusplanid` where `plustype`='member';
