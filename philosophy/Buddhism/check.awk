{
        for (i=1; i<=length($1); ++i)
        if (substr($1, i, 1) > "\177")
        {
                print $1
                count1++
                next
        }
        else
        {
                print "INVALID_CHARACTER"
                count2++
                next
        } }END{
        print count1"\t"count2 
}
