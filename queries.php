SELECT DISTINCTROW
	AC.id as AC_ID, AC.name AS AC_NAME, AC.last_name as AC_LAST_NAME,
    P.id as P_ID, P.caption AS P_CAPTION, activityTime,type

FROM `activity`,post as P, user as AC, user as AT WHERE `actor` in (SELECT rhsUserId FROM followings WHERE lhsUserId = 2) AND actor = AC.id AND (type = "Liked" or type = "Commented" )


// following likes or comments activity

// following activity
SELECT DISTINCTROW
	AC.id as AC_ID, AC.name AS AC_NAME, AC.last_name as AC_LAST_NAME,
	AT.id as AT_ID, AT.name AS AT_NAME, AT.last_name as AT_LAST_NAME,
    activityTime, type

FROM `activity`,user as AC, user as AT WHERE `actor` in (SELECT rhsUserId FROM followings WHERE lhsUserId = 2) AND actor = AC.id AND (type = "Followed" ) AND AT.id != AC.id