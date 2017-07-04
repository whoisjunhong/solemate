public class Prata
{
 	public virtual void prataDone()
{
  Console.WriteLine("Prata made.");
 }
}

class Prata : EggPrata
{
 	public int prataID = 1;
 
	 public override void prataDone()
 	{
  		Console.WriteLine("Egg Prata made.");
 	}
}

class Prata : PlainPrata
{
 	public int prataID = 2;
 
 	public override void prataDone()
	{
  		Console.WriteLine("Plain Prata made.");
	}
}

class iPrata
{
 	public static Prata makePlainPrata(string prataSize)
 	{
  	PlainPrata Prata = new PlainPrata();
  	Prata.type(type);
  	return Prata;
 	}
 
	 public static Prata createEggPrata(string prataSize)
 	{
 		EggPrata Prata = new EggPrata();
  		Prata.type(type);
  		return Prata;
 	}
}

class Client
{
 	public void makePrata()
 	{
  		Prata PlainPrata = iPrata.makePlainPrata();
  		Prata EggPrata = iPrata.makeEggPrata();
 	}
}